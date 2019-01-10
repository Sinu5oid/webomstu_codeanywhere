{extends file="./page.tpl"}
{block name="content"}
  <div class="row justify-content-center my-3">
    <div class="col col-6">
      <div class="card border-dark">
        <div class="card-header">
          <h3>{$title}</h3>
        </div>
        <div class="card-body">
          <div class="alert alert-danger">{$data.message}</div>
        </div>
        <div class="card-footer">
          <a href="{$data.back_url}" class="btn btn-primary">Back to home page</a>
        </div>
      </div>
    </div>
  </div>  
{/block}