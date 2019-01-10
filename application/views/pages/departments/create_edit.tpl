{extends file="../page.tpl"}
{block name="content"}
  <div class="row justify-content-center my-3">
    <div class="col col-6">
      <div class="card border-dark">
        <div class="card-header">
          <h3>{$title}</h3>
        </div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              {if $data.action eq "edit"}
              <label for="dep_id">Department ID</label>
              <input type="number" class="form-control" id="dep_id" name="dep_id" disabled value="{$data.department.dep_id}">
              <label for="dep_name">Department name</label>
              <input type="text" required class="form-control" id="dep_name" name="dep_name" value="{$data.department.dep_name}">
              {else}
              <label for="dep_name">Department name</label>
              <input type="text" required class="form-control" name="dep_name" id="dep_name">
              {/if}
            </div>
            {if $data.action eq "edit"}
            <button type="submit" class="btn btn-primary">Save changes</button>
            {else}
            <button type="submit" class="btn btn-primary">Create</button>
            {/if}
          </form>
        </div>
        <div class="card-footer">
          <a href="{$data.back_url}" class="btn btn-primary">Back</a>
        </div>
      </div>
    </div>
  </div>  
{/block}