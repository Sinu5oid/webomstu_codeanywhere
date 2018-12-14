{extends file="./page.tpl"}
{block name="content"}
  <div class="row justify-content-center">
    <div class="col-6">
      <div class="card card-info my-3 border-dark">
        <div class="card-header">
          <h3>Registration</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="http://{$base_url}registration">
            {if !empty($messages)}
              <div class="form-group">
                {foreach $messages as $message}
                  <div class="alert alert-danger"><i class="fa fa-warning"></i> {$message}</div>
                {/foreach}
              </div>
            {/if}
            <div class="form-group">
              <label>Login</label>
              <input class="form-control" type="text" name="login" placeholder="Login">
            </div>
            <div class="form-group">
              <label>E-mail</label>
              <input class="form-control" type="text" name="email" placeholder="E-mail">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <label>Confirm password</label>
              <input class="form-control" type="password" name="confirm" placeholder="Confirm password">
            </div>
            <hr class="border-secondary">
            <div class="form-group">
              <input class="btn btn-block btn-dark" type="submit" value="Registration">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
{/block}