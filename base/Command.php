<?php
/**
 * @author bean
 * @version 2.0
 */
namespace newx\migration\base;

use newx\console\base\Console;
use newx\helpers\ArrayHelper;

class Command extends Console
{
    /**
     * 数据迁移
     */
    public function run()
    {
        try {
            $migration = new Migration();
            switch ($this->option) {
                case 'init':
                    $migration->init();
                    break;
                case 'create':
                    $fileName = ArrayHelper::value($this->argv, 2);
                    if (!$fileName) {
                        throw new \Exception('file name is not specified');
                    }
                    $migration->create($fileName);
                    break;
                default:
                    $migration->run($this->option);
                    break;
            }
        } catch (\Exception $e) {
            exit("{$e->getMessage()} in {$e->getFile()} : {$e->getLine()}\n");
        }
    }
}