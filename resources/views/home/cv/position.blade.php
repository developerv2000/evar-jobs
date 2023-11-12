
<div class="tab-pane fade" id="pills-position" role="tabpanel" aria-labelledby="pills-position-tab">
   <h3>Должность</h3>
   
   <div class="w-50-inner">
      <div class="width-100">
         <label>На какую должность вы претендуете?<span>*</span></label>
         <select name="position" class="cv-select" data-placeholder="Должность" id="position">
           <option></option>
           @foreach ($positions as $position)
               <option value="{{$position->id}}">{{$position->name}}</option>
           @endforeach
         </select>
      </div>
   </div>

   <div class="cv-form-navigations">
      <button class="button thirdinary-button" type="button" onclick="form_previous_tab('pills-personal-tab')">Назад</button>
      <button class="button main-button" id="btn-position-next" type="button" onclick="form_next_tab()">Далее</button>
   </div>

</div>