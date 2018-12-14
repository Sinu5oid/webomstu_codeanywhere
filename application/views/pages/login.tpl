{extends file="./page.tpl"}
{block name="content"}
  <div class="row justify-content-center my-3">
    <div class="col col-6">
      <div class="card border-dark">
        <div class="card-header">
          <h3>Login</h3>
        </div>
        <div class="card-body">
          {if !empty($messages)}
            <div class="form-group">
              {foreach $messages as $message}
                <div class="alert alert-danger"><i class="fa fa-warning"></i> {$message}</div>
              {/foreach}
            </div>
          {/if}
          <form method="POST" action="http://{$base_url}login">
            <div class="form-group">
              <label>Login</label>
              <input class="form-control" type="text" name="login" placeholder="Login or e-mail">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <hr class="border-secondary">
            <div class="form-group">
              <input class="btn btn-block btn-dark" type="submit" value="Login">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>  
{/block}