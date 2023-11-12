
<div class="tab-pane fade" id="pills-education" role="tabpanel" aria-labelledby="pills-education-tab">
   <h3>Образование</h3>

   <div class="w-100-50 education-block">  {{-- 1 Education Block Start--}}
      <div class="w-50-inner"> {{-- Education Leftside Start--}}
         <div class="width-100">
            <div class="width-100">
               <label>Уровень образования<span>*</span></label>
               <select name="education1-lvl" class="cv-select" data-placeholder="Выберите" id="education1-lvl">
                 <option></option>
                 <option value="0">Среднее (школа, лицей)</option>
                 <option value="1">Среднее - специальное (колледж)</option>
                 <option value="2">Высшее (бакалаврият, магистратура)</option>
               </select>
             </div>
   
             <div class="width-100 mt-18px">
               <label>Наименование учебного завидения<span>*</span></label>
               <input class="cv-input" type="text" name="education1-institution-name" />
            </div>
   
            <div class="width-100 mt-18px">
               <label>Специализация (если есть)</label>
               <input class="cv-input" type="text" name="education1-specialization" />
            </div>
         </div>
      </div> {{-- Education Leftside End--}}

      <div class="w-50-inner"> {{-- Education Rightside Start--}}
         <div class="w-50-inner"> 
            <div class="width-100">
               <label>Год поступления<span>*</span></label>
               <select name="education1-beginning" class="cv-select" data-placeholder="Выберите" id="education1-beginning">
                  <option></option>
                  @for($i=1970; $i<=$currentYear; $i++) 
                     <option value="{{$i}}">{{$i}}</option>
                  @endfor
               </select>
            </div>
         </div>

         <div class="w-50-inner"> 
            <div class="width-100">
               <label>Год окончания<span>*</span></label>
               <select name="education1-finished" class="cv-select" data-placeholder="Выберите" id="education1-finished">
                  <option></option>
                  @for($i=$currentYear + 5; $i>1970; $i--)
                     <option value="{{$i}}">{{$i}}</option>
                  @endfor
               </select>
            </div>
         </div>
      </div>  {{-- Education Rightside End--}}
   </div> {{-- 1 Education Block End--}}

   <div class="mt-18px add-additional-inputs" id="show_additional_education" onclick="show_additional_education()">
      У меня есть дополнительное образование
   </div>

   <div class="w-100-50 education-block" id="additional_education">  {{-- Additional Education Block Start--}}
      <div class="w-50-inner"> {{-- Education Leftside Start--}}
         <div class="width-100">
            <div class="width-100">
               <label>Уровень образования<span>*</span></label>
               <select name="education2-lvl" class="cv-select" data-placeholder="Выберите" id="education2-lvl">
                  <option></option>
                  <option value="0">Среднее (школа, лицей)</option>
                  <option value="1">Среднее - специальное (колледж)</option>
                  <option value="2">Высшее (бакалаврият, магистратура)</option>
                </select>
             </div>
   
             <div class="width-100 mt-18px">
               <label>Наименование учебного завидения<span>*</span></label>
               <input class="cv-input" type="text" name="education2-institution-name" />
            </div>
   
            <div class="width-100 mt-18px">
               <label>Специализация (если есть)</label>
               <input class="cv-input" type="text" name="education2-specialization" />
            </div>

            <div class="mt-18px add-additional-inputs" onclick="hide_additional_education()">Удалить дополнительное образование</div>

         </div>
      </div> {{-- Education Leftside End--}}

      <div class="w-50-inner"> {{-- Education Rightside Start--}}
         <div class="w-50-inner"> 
            <div class="width-100">
               <label>Год поступления<span>*</span></label>
               <select name="education2-beginning" class="cv-select" data-placeholder="Выберите" id="education2-beginning">
                  <option></option>
                  @for($i=1970; $i<=$currentYear; $i++)
                     <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
            </div>
         </div>

         <div class="w-50-inner"> 
            <div class="width-100">
               <label>Год окончания<span>*</span></label>
               <select name="education2-finished" class="cv-select" data-placeholder="Выберите" id="education2-finished">
                  <option></option>
                  @for($i=$currentYear + 5; $i>1970; $i--)
                     <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
            </div>
         </div>
      </div>  {{-- Education Rightside End--}}
   </div> {{-- Additional Education Block End--}}

   {{-- Languages Block Start--}}
   <div class="languages-container">
      <h3>Знание языков</h3>
      <div class="w-100-33">
         <div class="w-33-inner">
            <label>Таджикский язык<span>*</span></label>
            <select name="tajik-lvl" class="cv-select" data-placeholder="Выберите" id="tajik-lvl">
              <option></option>
              <option value="1">Отлично</option>
              <option value="2">Хорошо</option>
              <option value="3">Плохо</option>
            </select>
         </div>

         <div class="w-33-inner">
            <label>Русский язык<span>*</span></label>
            <select name="russian-lvl" class="cv-select" data-placeholder="Выберите" id="russian-lvl">
              <option></option>
              <option value="1">Отлично</option>
              <option value="2">Хорошо</option>
              <option value="3">Плохо</option>
            </select>
         </div>

         <div class="w-33-inner">
            <label>Английский язык<span>*</span></label>
            <select name="english-lvl" class="cv-select" data-placeholder="Выберите" id="english-lvl">
              <option></option>
              <option value="1">Отлично</option>
              <option value="2">Хорошо</option>
              <option value="3">Плохо</option>
            </select>
         </div>
      </div>
   </div>
   {{-- Languages Block End--}}

   <div class="cv-form-navigations">
      <button class="button thirdinary-button" type="button" onclick="form_previous_tab('pills-address-tab')">Назад</button>
      <button class="button main-button" id="btn-education-next" type="button" onclick="form_next_tab()">Далее</button>
   </div>

</div>