{extends file="./page.tpl"}
{block name="content"}
  <div class="row mt-2">
    <h1>{$heading}</h1>
  </div>
  <div class="container">
    <h2>Accessible tables</h2>
      <ul class="list-group">
        <li class="list-group-item"><a class="btn btn-primary" href="/departments">Departments</a></li>
        <li class="list-group-item"><a class="btn btn-primary" href="/staff">Staff</a></li>
        <li class="list-group-item"><a class="btn btn-primary" href="/chambers">Chambers</a></li>
        <li class="list-group-item"><a class="btn btn-primary" href="/patients">Patients</a></li>
      </ul>
  </div>
{/block}