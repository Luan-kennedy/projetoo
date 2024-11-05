<header><h1><i class="bi bi-book-half"></i> Agendar</h1></header>
    <div>
        <form class="needs-validation" action="index.php?escolha=adicionar" novalidate method="post">
            <div class="mb-3">
                <label class="form-label" for="nomeagendar">Nome</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                    <input class="form-control" type="text" name="nome" required>
                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Campo obrigatorio</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="telagendar">Telefone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone-forward-fill"></i></span>    
                    <input class="form-control" type="tel" name="telefone" required>
                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Campo obrigatorio</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="emailagendar">E-mail</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input class="form-control" type="email" name="email">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-3">
                    <label class="form-label" for="dataagendar">Data</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-date-fill"></i></span>
                        <input class="form-control" type="date" name="dataa" required>
                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Campo obrigatorio</div>
                    </div>
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label" for="horaagendar">Horario</label>
                    <div class="inpunt-group">
                        <input class="form-control" type="time" name="hora" required>
                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Campo obrigatorio</div>
                    </div>
            </div>    
            </div class="mb-3">

            <input class="btn btn-primary"type="submit" value="Agendar" name="btagendar">

            </form>
    </div>
    <br>
    