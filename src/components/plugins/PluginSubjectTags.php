<?php
namespace tagnow\components\plugins;

use extas\components\extensions\TExtendable;
use extas\components\plugins\Plugin;
use extas\interfaces\IItem;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\routes\IRouteDispatcher;
use extas\interfaces\stages\IStageApiViewData;
use tagnow\interfaces\subjects\ISubject;
use tagnow\interfaces\tags\ITag;

/**
 * @method IRepository tags()
 */
class PluginSubjectTags extends Plugin implements IStageApiViewData
{
    use TExtendable;

    public function __invoke(IItem &$item, IRouteDispatcher $dispatcher): void
    {
        $item['tags'] = $this->tags()->allAsArray([
            ITag::FIELD__SUBJECT_ID => $item[ISubject::FIELD__ID]
        ]);
    }

    protected function getSubjectForExtension(): string
    {
        return 'tagnow.plugin.subject.tags';
    }
}
