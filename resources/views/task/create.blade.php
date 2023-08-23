<x-layout title="Cadastro de Task">
    <form action="/tasks/store" method="POST">
        @csrf

        <div class="d-flex gap-3 mb-3">
            <div class="w-50">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control required">

                @error('nome')
                    <span class="alert alert-danger d-block p-2 mt-3">{{ $message }}</span>
                @enderror
            </div>


            <div class="w-50">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="1">Ativo</option>
                    <option value="2">Inativo</option>
                </select>
            </div>
        </div>
    
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</x-layout>