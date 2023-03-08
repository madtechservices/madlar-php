<?php

namespace TomatoPHP\TomatoPHP\Services\Generator\Concerns;

trait GenerateEditView
{
    private function generateEditView(): void
    {
        $folders = [];
        if($this->moduleName){
            $folders[] = module_path($this->moduleName) . "/Resources/views/{$this->tableName}";
        }
        else {
            $folders[] = resource_path("views/{$this->tableName}");
        }

        $this->generateStubs(
            $this->stubPath . "edit.stub",
            $this->moduleName ? module_path($this->moduleName) . "/Resources/views/".str_replace('_', '-', $this->tableName)."/edit.blade.php" : resource_path("views/admin/{$this->tableName}/edit.blade.php"),
            [
                "title" => $this->modelName,
                "table" => str_replace('_', '-', $this->tableName),
                "cols" => $this->generateForm()
            ],
            $folders
        );
    }
}
