<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewCommand extends Command
{
    protected $signature = 'make:view {name} {--crud}';
    protected $description = 'Crea vistas base (CRUD)';

    public function handle()
    {
        $name = strtolower($this->argument('name'));
        $viewPath = resource_path("views/{$name}");

        if (!File::exists($viewPath)) {
            File::makeDirectory($viewPath, 0755, true);
        }

        if ($this->option('crud')) {
            $views = ['index', 'create', 'edit', 'show'];
            foreach ($views as $view) {
                $this->createCrudView($viewPath, $name, $view);
            }
            $this->info("Vistas CRUD creadas en resources/views/{$name}/");
        } else {
            $this->createCrudView($viewPath, $name, 'index');
            $this->info("Vista creada en resources/views/{$name}/index.blade.php");
        }
    }

    protected function createCrudView($path, $modelName, $viewName)
    {
        $modelTitle = ucfirst($modelName);
        $content = $this->getTemplateContent($modelTitle, $viewName, $modelName);
        File::put("{$path}/{$viewName}.blade.php", $content);
    }

    protected function getTemplateContent($title, $viewName, $model)
    {
        $variable = strtolower($model);
        $plural = \Illuminate\Support\Str::plural($variable);

        switch ($viewName) {

            // ===================================
            // INDEX
            // ===================================
            case 'index':
                $content = <<<'HTML'
@extends('pages.base')

@section('title', 'TITLE_PLACEHOLDER')

@section('section')

        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($PLURAL_PLACEHOLDER as $VARIABLE_PLACEHOLDER)
                    <tr>
                        <td>{{ $VARIABLE_PLACEHOLDER->id }}</td>
                        <td>{{ $VARIABLE_PLACEHOLDER->nombre ?? '—' }}</td>
                        <td>
                        <a href="{{ route('MODEL_PLACEHOLDER.edit', $VARIABLE_PLACEHOLDER) }}" class="btn btn-success">Editar</a>
                        <form action="{{ route('MODEL_PLACEHOLDER.destroy', $VARIABLE_PLACEHOLDER) }}" method="POST" class='d-inline'>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
@endsection
HTML;
                return str_replace(
                    ['TITLE_PLACEHOLDER', 'MODEL_PLACEHOLDER', 'PLURAL_PLACEHOLDER', 'VARIABLE_PLACEHOLDER'],
                    [$title, $model, $plural, $variable],
                    $content
                );

            // ===================================
            // CREATE
            // ===================================
            case 'create':
                $content = <<<'HTML'
@extends('pages.base')

@section('title', 'TITLE_PLACEHOLDER')

@section('section')
    <form action="{{ route('MODEL_PLACEHOLDER.store') }}" method="POST">
        @csrf

        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre"   class="form-control"> <br>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('MODEL_PLACEHOLDER.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
HTML;
                return str_replace(
                    ['TITLE_PLACEHOLDER', 'MODEL_PLACEHOLDER'],
                    [$title, $model],
                    $content
                );

            // ===================================
            // EDIT
            // ===================================
            case 'edit':
                $content = <<<'HTML'
@extends('pages.base')

@section('title', 'TITLE_PLACEHOLDER')

@section('section')
    <form action="{{ route('MODEL_PLACEHOLDER.update', $MODEL_PLACEHOLDER) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ $MODEL_PLACEHOLDER->nombre }}" class="form-control"> <br>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('MODEL_PLACEHOLDER.index') }}" class="btn btn-danger">Cancelar</a>
    </form>

@endsection
HTML;
                return str_replace(
                    ['TITLE_PLACEHOLDER', 'MODEL_PLACEHOLDER'],
                    [$title, $model],
                    $content
                );

            // ===================================
            // SHOW
            // ===================================
            case 'show':
                $content = <<<'HTML'
@extends('pages.base')

@section('title', 'TITLE_PLACEHOLDER')

@section('section')

    <p>ID: {{ $MODEL_PLACEHOLDER->id }}</p>
    <p>Nombre: {{ $MODEL_PLACEHOLDER->nombre ?? '—' }}</p> 
    <br>
    <a href="{{ route('MODEL_PLACEHOLDER.index') }}" class="btn btn-primary">Volver</a>

@endsection
HTML;
                return str_replace(
                    ['TITLE_PLACEHOLDER', 'MODEL_PLACEHOLDER'],
                    [$title, $model],
                    $content
                );

            default:
                return "<!-- Vista no definida -->";
        }
    }
}