<?php
namespace tagnow\components\plugins;

use extas\components\extensions\TExtendable;
use extas\components\plugins\Plugin;
use extas\interfaces\IItem;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\routes\IRouteDispatcher;
use extas\interfaces\stages\IStageApiUpdateData;
use tagnow\components\tags\Tag;
use tagnow\interfaces\IHaveToken;
use tagnow\interfaces\subjects\ISubject;
use tagnow\interfaces\tags\ITag;

/**
 * @method IRepository tags()
 */
class PluginUpdateSubject extends Plugin implements IStageApiUpdateData
{
    use TExtendable;

    /**
     * 
     *
     * @param IItem|ISubject $item
     * @param array $data
     * @param IRouteDispatcher $dispatcher
     * @return void
     */
    public function __invoke(IItem &$item, array $data, IRouteDispatcher $dispatcher): void
    {
        if (!isset($data['tags'])) {
            return;
        }

        $itemTags = [];
        $tags   = $data['tags'];
        $exists = $this->tags()->allAsArray([
            ITag::FIELD__NAME       => $tags,
            ITag::FIELD__SUBJECT_ID => $item->getId()
        ]);

        $itemTags = array_column($exists, ITag::FIELD__NAME);

        $new = array_diff($tags, $itemTags);

        foreach ($new as $tag) {
            $this->tags()->create(new Tag([
                Tag::FIELD__NAME => $tag,
                Tag::FIELD__SUBJECT_ID => $item->getId(),
                Tag::FIELD__TOKEN => $data[IHaveToken::FIELD__TOKEN]
            ]));
            $itemTags[] = $tag;
        }

        $item['tags'] = $itemTags;
    }

    protected function getSubjectForExtension(): string
    {
        return 'tagnow.plugin.update.subject';
    }
}
