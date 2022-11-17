<?php
namespace tagnow\components\plugins;

use extas\components\extensions\TExtendable;
use extas\components\plugins\Plugin;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\routes\IRouteDispatcher;
use extas\interfaces\stages\IStageApiListData;
use tagnow\interfaces\subjects\ISubject;
use tagnow\interfaces\tags\ITag;

/**
 * @method IRepository tags()
 */
class PluginSubjectsTags extends Plugin implements IStageApiListData
{
    use TExtendable;

    public function __invoke(array &$items, IRouteDispatcher $dispatcher): void
    {
        foreach ($items as $index => $item) {
            $items[$index]['tags'] = array_column($this->tags()->allAsArray([
                ITag::FIELD__SUBJECT_ID => $item[ISubject::FIELD__ID]
            ]), ITag::FIELD__NAME);
        }
    }

    protected function getSubjectForExtension(): string
    {
        return 'tagnow.plugin.subject.tags';
    }
}
