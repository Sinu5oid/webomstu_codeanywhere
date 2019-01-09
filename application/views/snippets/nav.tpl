{if !isset($login_flag)}
  {assign var="login_flag" value="{false}"}
{/if}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Web OmSTU</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav justify-content-end">
      {if (bool)$login_flag}
        <li class="nav-item"><a class="nav-link" href="http://{$base_url}logout">Logout</a></li>
      {else}
        <li class="nav-item"><a class="nav-link" href="http://{$base_url}login">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="http://{$base_url}registration">Registration</a></li>
      {/if}
    </ul>
  </div>
</nav>