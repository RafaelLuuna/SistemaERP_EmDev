<div class="card" id="card">
    <div>
        <div class="card-section">
    
            <h2 class="title">PAINEL ADMIN</h2>
            
            <hr color="gainsboro" size="1px">
            
        </div>
    
        
        <div class="card-section">
            <form action="scripts/logar.php" method="POST">
                
                <div class="input-group">
                    <label class="label" for="email">E-mail</label>
                    <input value="a@a.com"class="input" name="email" type="email" id="email" placeholder="E-mail" required>
                </div>
                
                <div class="input-group">
                    <label class="label" for="senha">Senha</label>
                    <input class="input" name="senha" minlength="3" type="password" id="password" placeholder="Senha" required>
                </div>
                
                <input class="btn" type="submit" value="Acessar">
            </form>
        </div>

    </div>
</div>