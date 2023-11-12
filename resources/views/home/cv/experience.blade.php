
<div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
   <h3>Опыт работы</h3>
   
   <div class="w-50-inner">   {{-- Question Start --}}
      <div class="w-50-inner">
         <label>У вас есть опыт работы?<span>*</span></label>
      </div>
      <div class="w-50-inner experience-radio">
         <input class="cv-radio" type="radio" name="experienced" id="experienced_false" value="0" />
         <label for="experienced_false" id="experienced_false_label">Нет</label>
         <input class="cv-radio" type="radio" name="experienced" id="experienced_true" value="1" />
         <label for="experienced_true">Да</label>
      </div>
   </div> {{-- Question End --}}

   <div id="experience-container"> {{-- Main Experience Container Start --}}
      <div class="w-100-50 mt-18px">  {{-- First Experience Block Start --}}
         <div class="w-50-inner"> {{-- Experience Block LeftSide Start --}}
            <div class="width-100">
               <div class="width-100">
                  <label>Организация<span>*</span></label>
                  <input class="cv-input" type="text" name="job1-organization" />
               </div>
   
               <label class="mt-18px">Дата приёма<span>*</span></label>
   
               <div class="w-100-50"> {{-- Date Of Receipt Start --}}
                  <div class="w-50-inner">
                     <div class="width-100">
                        <select name="job1-beginning-month" class="cv-select" data-placeholder="Месяц" id="job1-beginning-month">
                          <option></option>
                          @include('home.cv.monthes')
                        </select>
                     </div>
                  </div>
   
                  <div class="w-50-inner">
                     <select name="job1-beginning-year" class="cv-select" data-placeholder="Выберите" id="job1-beginning-year">
                        <option></option>
                        @for($i=$currentYear; $i>1970; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                  </div>
               </div> {{-- Date Of Receipt End --}}
   
               <label class="mt-18px">Дата увольнения<span>*</span></label>

               <div class="w-100-50"> {{-- Date Of Dismissal Start --}}
                  <div class="w-50-inner">
                     <div class="width-100">
                        <select name="job1-finished-month" class="cv-select" data-placeholder="Месяц" id="job1-finished-month">
                          <option></option>
                          @include('home.cv.monthes')
                        </select>
                     </div>
                  </div>
   
                  <div class="w-50-inner">
                     <select name="job1-finished-year" class="cv-select" data-placeholder="Выберите" id="job1-finished-year">
                        <option></option>
                        @for($i=$currentYear; $i>1970; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                  </div>
               </div> {{-- Date Of Dismissal End --}}

               <div class="mt-18px add-additional-inputs" id="show_additional_experience" onclick="show_additional_experience()">
                  Добавить место работы
               </div>

            </div>
         </div> {{-- Experience Block LeftSide End --}}

         <div class="w-50-inner"> {{-- Experience Block RightSide Start --}}
            <div class="width-100">
               <label>Должность<span>*</span></label>
               <input type="text" class="cv-input" name="job1-position" />
               <label class="mt-18px">Основные объязанности<span>*</span></label>
               <textarea class="cv-input" name="job1-duties" rows="5" id="job1-duties"></textarea>
            </div>
         </div>

      </div> {{-- First Experience End --}}



      <div class="w-100-50 mt-18px" id="additional_experience">  {{-- Additional Experience Block Start --}}
         <div class="w-50-inner"> {{-- Experience Block LeftSide Start --}}
            <div class="width-100">
               <div class="width-100">
                  <label>Организация<span>*</span></label>
                  <input class="cv-input" type="text" name="job2-organization" />
               </div>
   
               <label class="mt-18px">Дата приёма<span>*</span></label>
   
               <div class="w-100-50"> {{-- Date Of Receipt Start --}}
                  <div class="w-50-inner">
                     <div class="width-100">
                        <select name="job2-beginning-month" class="cv-select" data-placeholder="Месяц" id="job2-beginning-month">
                          <option></option>
                          @include('home.cv.monthes')
                        </select>
                     </div>
                  </div>
   
                  <div class="w-50-inner">
                     <select name="job2-beginning-year" class="cv-select" data-placeholder="Выберите" id="job2-beginning-year">
                        <option></option>
                        @for($i=$currentYear; $i>1970; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                  </div>
               </div> {{-- Date Of Receipt End --}}
   
               <label class="mt-18px">Дата увольнения<span>*</span></label>

               <div class="w-100-50"> {{-- Date Of Dismissal Start --}}
                  <div class="w-50-inner">
                     <div class="width-100">
                        <select name="job2-finished-month" class="cv-select" data-placeholder="Месяц" id="job2-finished-month">
                          <option></option>
                          @include('home.cv.monthes')
                        </select>
                     </div>
                  </div>
   
                  <div class="w-50-inner">
                     <select name="job2-finished-year" class="cv-select" data-placeholder="Выберите" id="job2-finished-year">
                        <option></option>
                        @for($i=$currentYear; $i>1970; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                  </div>
               </div> {{-- Date Of Dismissal End --}}

               <div class="mt-18px add-additional-inputs" onclick="hide_additional_experience()">Удалить место работы</div>

            </div>
         </div> {{-- Experience Block LeftSide End --}}

         <div class="w-50-inner"> {{-- Experience Block RightSide Start --}}
            <div class="width-100">
               <label>Должность<span>*</span></label>
               <input type="text" class="cv-input" name="job2-position" />
               <label class="mt-18px">Основные объязанности<span>*</span></label>
               <textarea class="cv-input" name="job2-duties" rows="5" id="job2-duties"></textarea>
            </div>
         </div>

      </div> {{-- Additional Experience End --}}
   </div> {{-- Main Experience Container End --}}

   <div class="cv-form-navigations">
      <button class="button thirdinary-button" type="button" onclick="form_previous_tab('pills-education-tab')">Назад</button>
      <button class="button main-button" id="btn-experience-next" type="button" onclick="form_next_tab()">Далее</button>
   </div>

</div>