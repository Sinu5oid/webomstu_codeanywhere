{extends file="../page.tpl"}
{block name="content"}
  <div class="row justify-content-center my-3">
    <div class="col col-6">
      <div class="card border-dark">
        <div class="card-header">
        <div class="row">
          <div class="col-md-8">
            <h3>{$title}</h3>
          </div>
            {if $data.action eq "index"}
              <div class="col-md-4">
                <a href="{$data.current_uri}/create" class="btn btn-success">Create</a>
              </div>
            {/if}
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                {if $data.action neq "index"}
                <th>
                  Doctor ID
                </th>
                {/if}
                <th>
                  Doctor surname
                </th>
                <th>
                  Salary
                </th>
                <th>
                  Phone
                </th>
                {if $data.action eq "index"}
                <th>
                  Actions
                </th>
                {/if}
              </tr>
            </thead>
              {foreach from=$data.staff item=doctor}
              <tr>
                {if $data.action neq "index"}
                <td>{$doctor.doc_id}</td>
                {/if}
                <td>{$doctor.doc_surname}</td>
                <td>{$doctor.doc_salary}</td>
                <td>{$doctor.doc_phone}</td>
                <td>
                {if $data.action eq "index"}
                  <div class="btn-group">
                    <a href="{$data.current_uri}/edit/{$doctor.doc_id}" class="btn btn-primary">Edit</a>
                    <a href="{$data.current_uri}/details/{$doctor.doc_id}" class="btn btn-info">Details</a>
                    <a href="{$data.current_uri}/delete/{$doctor.doc_id}" class="btn btn-danger">Delete</a>
                  </div>
                {/if}
                </td>
              </tr>
              {/foreach}
          </table>
        </div>
        {if $data.action neq "index"}
        <div class="card-footer">
          <div class="row">
            <div class="col-md-6">
              <a href="/staff" class="btn btn-primary">Back</a>
            </div>
          {if $data.action eq "delete"}
            <div class="col-md-6">
              <form method="post">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
        {/if}
        </div>
        {/if}
      </div>
    </div>
  </div>  
{/block}