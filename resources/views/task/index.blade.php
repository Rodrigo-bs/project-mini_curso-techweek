<x-layout title="Tasks" disabled="true">
    <a href="/tasks/create" class="btn btn-dark mb-3 p-2">Adicionar</a>

    @if (count($tasks) > 0)
        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        {{ $task->name }}
                    </span>

                    <div class="d-flex gap-2">
                        <a class="btn btn-warning" href="/tasks/edit/{{ $task->id }}">Editar</a>

                        <form action="/tasks/delete/{{ $task->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Deletar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhuma Task cadastrada.</p>
    @endif
</x-layout>