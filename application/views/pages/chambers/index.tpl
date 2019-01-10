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
                  Chamber ID
                </th>
                {/if}
                <th>
                  Department name
                </th>
                <th>
                  Chamber number
                </th>
                <th>
                  Chamber beds count
                </th>
                <th>
                  Doctor surname
                </th>
                {if $data.action eq "index"}
                <th>
                  Actions
                </th>
                {/if}
              </tr>
            </thead>
              {foreach from=$data.chambers item=chamber}
              <tr>
                {if $data.action neq "index"}
                <td>{$chamber.cham_id}</td>
                {/if}
                <td>{$chamber.dep_name}</td>
                <td>{$chamber.cham_num}</td>
                <td>{$chamber.cham_beds_count}</td>
                <td>{$chamber.doc_id}</td>
                <td>
                {if $data.action eq "index"}
                  <div class="btn-group">
                    <a href="{$data.current_uri}/edit/{$chamber.cham_id}" class="btn btn-primary">Edit</a>
                    <a href="{$data.current_uri}/details/{$chamber.cham_id}" class="btn btn-info">Details</a>
                    <a href="{$data.current_uri}/delete/{$chamber.cham_id}" class="btn btn-danger">Delete</a>
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
              <a href="/chambers" class="btn btn-primary">Back</a>
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