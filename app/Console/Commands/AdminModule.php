<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AdminModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:module {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $columns = [];
    protected $table;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->table = $this->argument('table');
        $this->columns = Schema::getColumnListing($this->table);

        if (!Schema::hasTable($this->table)) {
            $this->error("Table {$this->table} does not exist!");
            return;
        }
        $this->model();
        $this->controller();
        $this->views();
        $this->requests();
        $this->components();
    }

    protected function model(): void
    {
        $singularUppercaseName = ucfirst(Str::singular($this->table));
        $path = app_path("Models/{$singularUppercaseName}.php");
        $result = $this->makeTemplate([
            '{{PluralName}}' => $this->table,
            '{{SingularUppercaseName}}' => $singularUppercaseName,
            '{{Fillable}}' => $this->fillable(),
            '{{Scopes}}' => $this->scopes(),
        ], 'Model');
        $this->save($path, $result);
        $this->info("{$path} saved!");
        return;
    }

    protected function controller(): void
    {
        $singularLowercaseName = Str::singular($this->table);
        $singularUppercaseName = ucfirst($singularLowercaseName);
        $path = app_path("Http/Controllers/Admin/{$singularUppercaseName}Controller.php");
        $result = $this->makeTemplate([
            '{{SingularUppercaseName}}' => $singularUppercaseName,
            '{{SingularLowercaseName}}' => $singularLowercaseName,
            '{{PluralName}}' => $this->table,
        ], 'Controller');
        $this->save($path, $result);
        $this->info("{$path} saved!");
        return;
    }

    protected function views()
    {
        $path = resource_path("views/admin/{$this->table}");
        if($this->makeDir($path)) {
            $this->index();
            $this->filters();
            $this->createOrEdit('create');
            $this->createOrEdit('edit');
        }
    }

    protected function requests()
    {
        $requests = [
            'Index',
            'Store',
            'Update',
            'Delete',
        ];
        $singularUppercaseName = ucfirst(Str::singular($this->table));
        $path = app_path("Http/Requests/Admin/$singularUppercaseName");
        if($this->makeDir($path)) {
            foreach ($requests as $request) {
                $path = app_path("Http/Requests/Admin/{$singularUppercaseName}/{$request}.php");
                $result = $this->makeTemplate([
                    '{{SingularUppercaseName}}' => $singularUppercaseName,
                    '{{Rules}}' => $this->rules(),
                ], "requests/{$request}");
                $this->save($path, $result);
                $this->info("{$path} saved!");
            }
        }
    }

    protected function components(): void
    {
        $components = [
            'index',
            'create',
            'edit'
        ];
        $path = resource_path("js/components/admin/{$this->table}");
        if($this->makeDir($path)) {
            foreach ($components as $component) {
                $path = resource_path("js/components/admin/{$this->table}/{$component}.js");
                $result = $this->makeTemplate([
                    '{{PluralName}}' => $this->table,
                ], "components/{$component}");
                $this->save($path, $result);
                $this->info("{$path} saved!");
            }
        }
    }


    protected function makeDir(string $path): bool
    {
        if(is_dir($path)) {
            $this->error("Path {$path} already exist!");
            return true;
        }
        try {
            mkdir($path, 0755, true);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    protected function fillable(): string
    {
        $result = '';
        foreach ($this->columns as $column) {
            $result .= $this->makeTemplate([
                '{{Column}}' => $column,
            ], 'Fillable');
        }
        return $result;
    }

    protected function rules(): string
    {
        $result = '';
        foreach ($this->columns as $column) {
            $result .= $this->makeTemplate([
                '{{Column}}' => $column,
                '{{Rules}}' => $this->getRules($column),
            ], 'requests/Rules');
        }
        return $result;
    }

    protected function scopes(): string
    {
        $result = '';
        foreach ($this->columns as $column) {
            $result .= $this->makeTemplate([
                '{{Column}}' => $column,
                '{{ScopeType}}' => $this->getScopeType($column),
            ], 'Scopes');
        }
        return $result;
    }

    protected function getScopeType($column) :string
    {
        $type = Schema::getColumnType($this->table, $column);
        $scopeType = '';
        switch ($type) {
            case 'bit':
            case 'tinyint':
            case 'smallint':
            case 'int':
            case 'bigint':
            case 'decimal':
            case 'numeric':
            case 'float':
            case 'real':
                $scopeType = 'ofStrict';
                break;

            case 'date':
            case 'time':
            case 'datetime':
            case 'timestamp':
            case 'year':
                $scopeType = 'ofDate';
                break;

            default:
                $scopeType = 'ofLike';
                break;
        }
        return $scopeType;
    }

    protected function getRules($column) :string
    {
        $type = Schema::getColumnType($this->table, $column);
        $rules = '';
        switch ($type) {
            case 'bit':
            case 'tinyint':
            case 'smallint':
            case 'int':
            case 'bigint':
            case 'decimal':
            case 'numeric':
                $rules .= "'integer',";
                break;

            case 'date':
            case 'datetime':
            case 'timestamp':
                $rules .= "'date',";
                break;
        }
        return $rules;
    }

    protected function getFieldType($column) :string
    {
        $type = Schema::getColumnType($this->table, $column);
        $fieldType = '';
        switch ($type) {
            case 'date':
            case 'datetime':
            case 'timestamp':
                $fieldType = 'date';
                break;

            case 'text':
                $fieldType = 'textarea';
                break;

            default:
                $fieldType = 'text';
                break;
        }
        return $fieldType;
    }

    protected function index(): void
    {
        $path = resource_path("views/admin/{$this->table}/index.blade.php");
        $result = $this->makeTemplate([
            '{{PluralName}}' => $this->table,
            '{{PluralKebabcaseName}}' => str_replace('_', '-', $this->table),
            '{{TableHead}}' => $this->tableHead(),
            '{{TableBody}}' => $this->tableBody(),
        ], 'views/index.blade');
        $this->save($path, $result);
        $this->info("{$path} saved!");
        return;
    }

    protected function createOrEdit(string $action): void
    {
        $path = resource_path("views/admin/{$this->table}/{$action}.blade.php");
        $result = $this->makeTemplate([
            '{{PluralName}}' => $this->table,
            '{{PluralKebabcaseName}}' => str_replace('_', '-', $this->table),
            '{{Fields}}' => $this->fields(),
        ], "views/{$action}.blade");
        $this->save($path, $result);
        $this->info("{$path} saved!");
        return;
    }

    protected function filters(): void
    {
        $path = resource_path("views/admin/{$this->table}/filters.blade.php");
        $result = $this->makeTemplate([
            '{{Fields}}' => $this->fields(true, 'filters'),
        ], "views/filters.blade");
        $this->save($path, $result);
        $this->info("{$path} saved!");
        return;
    }

    protected function fields(bool $covered = false, string $model = 'form'): string
    {
        $result = '';
        foreach ($this->columns as $column) {
            $field = $this->makeTemplate([
                '{{PluralName}}' => $this->table,
                '{{Column}}' => $column,
                '{{FieldType}}' => $this->getFieldType($column),
                '{{Model}}' => $model,
            ], 'views/Fields');
            if($covered) {
                $field = "<div class=\"col-lg-4\">\n{$field}</div>\n";
            }
            $result .= $field;
        }
        return $result;
    }

    protected function tableHead(): string
    {
        $result = '';
        foreach ($this->columns as $column) {
            $result .= $this->makeTemplate([
                '{{PluralName}}' => $this->table,
                '{{Column}}' => $column,
            ], 'views/TableHead.blade');
        }
        return $result;
    }

    protected function tableBody(): string
    {
        $result = '';
        foreach ($this->columns as $column) {
            $result .= $this->makeTemplate([
                '{{Column}}' => $column,
            ], 'views/TableBody.blade');
        }
        return $result;
    }

    protected function makeTemplate(array $data, string $stub): string
    {
        return str_replace(
            array_keys($data),
            $data,
            $this->getStub($stub)
        );
    }

    protected function getStub(string $stub)
    {
        return File::get(resource_path("stubs/{$stub}.stub"));
    }

    protected function save(string $path, string $content): void
    {
        File::put($path, $content);
    }

}
