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
                  Patient ID
                </th>
                {/if}
                <th>
                  Patient surname
                </th>
                <th>
                  Chamber number
                </th>
                <th>
                  Workplace
                </th>
                <th>
                  Profession
                </th>
                <th>
                  Diagnosis
                </th>
                {if $data.action eq "index"}
                <th>
                  Actions
                </th>
                {/if}
              </tr>
            </thead>
              {foreach from=$data.patients item=patient}
              <tr>
                {if $data.action neq "index"}
                <td>{$patient.pat_id}</td>
                {/if}
                <td>{$patient.pat_surname}</td>
                <td>{$patient.pat_address}</td>
                <td>{$patient.cham_num}</td>
                <td>{$patient.pat_workplace}</td>
                <td>{$patient.pat_profession}</td>
                <td>{$patient.pat_diagnosis}</td>
                <td>
                {if $data.action eq "index"}
                  <div class="btn-group">
                    <a href="{$data.current_uri}/edit/{$patient.pat_id}" class="btn btn-primary">Edit</a>
                    <a href="{$data.current_uri}/details/{$patient.pat_id}" class="btn btn-info">Details</a>
                    <a href="{$data.current_uri}/delete/{$patient.pat_id}" class="btn btn-danger">Delete</a>
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
              <a href="/patients" class="btn btn-primary">Back</a>
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