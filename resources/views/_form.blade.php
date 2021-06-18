    @csrf
    <div class="mb-3">
        <label for="nome_completo" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" id="nome_completo" name="nome_completo" required maxlength="100" value="{{@$diarista->nome_completo}}">
    </div>
    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" required maxlength="14" value="{{@$diarista->cpf}}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required maxlength="100" value="{{@$diarista->email}}">
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" required maxlength="15" value="{{@$diarista->telefone}}">
    </div>
    <div class="mb-3">
        <label for="logradouro" class="form-label">Logradouro</label>
        <input type="text" class="form-control" id="logradouro" name="logradouro" required maxlength="255" value="{{@$diarista->logradouro}}">
    </div>
    <div class="mb-3">
        <label for="numero" class="form-label">Número</label>
        <input type="text" class="form-control" id="numero" name="numero" required maxlength="20" value="{{@$diarista->numero}}">
    </div>
    <div class="mb-3">
        <label for="complemento" class="form-label">Complemento</label>
        <input type="text" class="form-control" id="complemento" name="complemento" maxlength="50" value="{{@$diarista->complemento}}">
    </div>
    <div class="mb-3">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="bairro" name="bairro" required maxlength="50" value="{{@$diarista->bairro}}">
    </div>
    <div class="mb-3">
        <label for="bairro" class="form-label">CEP</label>
        <input type="text" class="form-control" id="cep" name="cep" required maxlength="9" value="{{@$diarista->cep}}">
    </div>
    <div class="mb-3">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" required maxlength="50" value="{{@$diarista->cidade}}">
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" required maxlength="2" value="{{@$diarista->estado}}">
    </div>

    <div class="mb-3">
        <label for="foto_usuario" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto_usuario" name="foto_usuario"  value="{{@$diarista->foto_usuario}}">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
