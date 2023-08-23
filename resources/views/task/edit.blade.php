<x-layout title="Atualizar Task">
    <form action="/tasks/update/{{$task->id}}" method="POST">
        @csrf
        @method('PUT')

        <div class="d-flex gap-3 mb-3">
            <div class="w-50">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" value="{{$task->name}}" name="nome" id="nome" class="form-control required">
            </div>

            <div class="w-50">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="1" @selected($task->status == '1')>Ativo</option>
                    <option value="2" @selected($task->status == '2')>Inativo</option>
                </select>
            </div>
        </div>
    
        <button type="submit" class="btn btn-warning">Atualizar</button>
    </form>
</x-layout>