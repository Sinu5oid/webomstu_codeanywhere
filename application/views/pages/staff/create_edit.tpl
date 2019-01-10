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
              <label for="doc_id">Doctor ID</label>
              <input type="number" class="form-control" id="doc_id" name="doc_id" disabled value="{$data.doctor.doc_id}">
              <label for="doc_surname">Doctor surname</label>
              <input type="text" class="form-control" id="doc_surname" name="doc_surname" value="{$data.doctor.doc_surname}">
              <label for="doc_salary">Salary</label>
              <input type="number" class="form-control" id="doc_salary" name="doc_salary" value="{$data.doctor.doc_salary}">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" id="doc_phone" name="doc_phone" value="{$data.doctor.doc_phone}">
              {else}
              <label for="doc_surname">Doctor surname</label>
              <input type="text" class="form-control" id="doc_surname" name="doc_surname">
              <label for="doc_salary">Salary</label>
              <input type="number" class="form-control" id="doc_salary" name="doc_salary">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" id="doc_phone" name="doc_phone">
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