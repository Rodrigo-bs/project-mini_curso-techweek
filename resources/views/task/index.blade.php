<x-layout title="Tasks" disabled="true">
    <a href="/tasks/create" class="btn btn-dark mb-3 p-2">Adicionar</a>

    @if (count($tasks) > 0)
        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-end">
                    {{ $task->name }}

                    <div>
                        <a class="btn btn-warning" href="/tasks/edit/{{ $task->id }}">Atualizar</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhuma Task cadastrada.</p>
    @endif
</x-layout>