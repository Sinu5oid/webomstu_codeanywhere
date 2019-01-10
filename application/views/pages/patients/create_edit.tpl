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
              <label for="cham_id">Patient ID</label>
              <input type="number" class="form-control" id="pat_id" name="pat_id" disabled value="{$data.patient.pat_id}">
              {/if}
              <label for="pat_surname">Patient name</label>
              <input type="number" class="form-control" id="pat_id" name="pat_id" disabled value="{$data.patient.pat_id}">
              <input list="dep_name">
                <select>
                  {foreach $data.dep_names item="dep_name_item"}
                    {if $dep_name_item.selected}
                      <option value="{$dep_name_item.dep_name}" selected>
                    {else}
                      <option value="{$dep_name_item.dep_name}">
                    {/if}
                  {/foreach}
                </select> 
              </input>
              <label for="cham_num">Chamber number</label>
              <input type="number" class="form-control" id="cham_num" name="cham_num" value="{$data.chamber.cham_num}">
              <label for="cham_beds_count">Chamber beds count</label>
              <input type="number" class="form-control" id="cham_beds_count" name="cham_beds_count" value="{$data.chamber.cham_beds_count}">
              <label for="doc_surname">Doctor surname</label>
              <input list="doc_surname">
                <select>
                  {foreach $data.doc_surnames item="doc_surname_item"}
                    {if $doc_surname_item.selected}
                      <option value="{$doc_surname_item.doc_surname}" selected>
                    {else}
                      <option value="{$doc_surname_item.doc_surname}">
                    {/if}
                  {/foreach}
                </select> 
              </input>
              {else}
              <label for="dep_name">Department name</label>
              <input list="dep_name">
                <select>
                  {foreach $data.dep_names item="dep_name_item"}
                    <option value="{$dep_name_item.dep_name}">
                  {/foreach}
                </select>
              </input>
              <label for="cham_num">Chamber number</label>
              <input type="number" class="form-control" id="cham_num" name="cham_num">
              <label for="cham_beds_count">Chamber beds count</label>
              <input type="number" class="form-control" id="cham_beds_count" name="cham_beds_count">
              <label for="doc_surname">Doctor surname</label>
              <input list="doc_surname">
                <select>
                  {foreach $data.doc_surnames item="doc_surname_item"}
                    <option value="{$doc_surname_item.doc_surname}">
                  {/foreach}
                </select> 
              </input>
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