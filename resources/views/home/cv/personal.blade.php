
<div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
   <h3>Персональная информация</h3>

   <div class="w-100-50-33">  {{-- w-100-50-33 Start --}}
      <div class="w-50-inner"> {{-- N.S.P Start --}}
         <div class="w-33-inner">
            <label>Фамилия<span>*</span></label>
            <input class="cv-input" type="text" name="surname" />
         </div>

         <div class="w-33-inner">
            <label>Имя<span>*</span></label>
            <input class="cv-input" type="text" name="name" />
         </div>

         <div class="w-33-inner">
            <label>Отчество</label>
            <input class="cv-input" type="text" name="patronymic" />
         </div>
      </div>
      {{-- N.S.P Start --}}


      {{-- Birthday Start --}}
      <div class="w-50-inner align-flex-end">
         <div class="w-33-inner">
            <label>Дата рождения<span>*</span></label>
            <select name="bday-day" class="cv-select" data-placeholder="День" id="bday-day">
               <option></option>
               @for($i=1; $i<32; $i++) <option value="{{$i}}">{{$i}}</option>
                  @endfor
            </select>
         </div>

         <div class="w-33-inner">
            <select name="bday-month" class="cv-select" data-placeholder="Месяц" id="bday-month">
               <option></option>
               @include('home.cv.monthes')
            </select>
         </div>

         <div class="w-33-inner">
            <select name="bday-year" class="cv-select" data-placeholder="Год" id="bday-year">
               <option></option>
               @for($i=$currentYear - 10; $i>1960; $i--)
               <option value="{{$i}}">{{$i}}</option>
               @endfor
            </select>
         </div>
      </div>   {{-- Birthday End --}}
   </div>  {{-- w-100-50-33 End --}}


   <div class="w-100-50 mt-18px married-container"> {{-- Married Start --}}
      <div class="w-50-inner">
         <div class="width-100">
            <label>Семейное положение<span>*</span></label>
            <select name="married" class="cv-select" id="married">
               <option value="0">Не женат / Не замужем</option>
               <option value="1">Женат / Замужем</option>
            </select>
         </div>
      </div>

      <div class="w-50-inner align-flex-end">
         <div class="w-33-inner">
            <label>Есть ли у вас дети?<span>*</span></label>
         </div>

         <div class="w-33-inner married-radios">
            <input class="cv-radio" type="radio" name="childs" id="no_childs" value="0" />
            <label class="no-childs-label" for="no_childs">Нет</label>
            <input class="cv-radio" type="radio" name="childs" id="has_childs" value="1" />
            <label for="has_childs">Да</label>
         </div>

         <div class="w-33-inner" id="childs_count_div">
            <label>Количество детей<span>*</span></label>
            <select name="childs-count" class="cv-select" id="childs-count">
               @for($i=1; $i<11; $i++) 
                  <option value="{{$i}}">{{$i}}</option>
               @endfor
            </select>
         </div>
      </div>
   </div>   {{-- Married End --}}


   <div class="w-100-50 mt-18px"> {{-- Phones & Email Start --}}
      <div class="w-50-inner phones-container">
         <div class="w-50-inner">
            <label>Телефон<span>*</span></label>
            <div class="single-phone-container">
               <div class="cv-input input-readonly">+992</div>
               <input class="cv-input" type="tel" onkeypress='validate(event)' maxlength="9" name="phone1" />
             </div>
         </div>

         <div class="w-50-inner">
            <label>Доп. телефон</label>
            <div class="single-phone-container">
               <div class="cv-input input-readonly">+992</div>
               <input class="cv-input" type="tel" onkeypress='validate(event)' maxlength="9" name="phone2" />
             </div>
         </div>
      </div>

      <div class="w-50-inner">
         <div class="w-100-50">
            <div class="w-50-inner upload-photo-div">
               <div class="width-100">
                  <label>Фото<span>*</span></label>   
                  <input name="photo" type="file" accept="image/*" class="upload-file upload-photo" id="photo" required>
               </div>
            </div>

            <div class="w-50-inner">
               <div class="width-100">
                  <label>E-mail</label>   
                  <input class="cv-input" type="text" name="email" />
               </div>
            </div>
         </div>
      </div>
   </div> {{-- Phones & Email & Photo End --}}

   <div class="cv-form-navigations">
      <button class="button main-button" id="btn-personal-next" type="button" onclick="form_next_tab()">Далее</button>
   </div>

</div>