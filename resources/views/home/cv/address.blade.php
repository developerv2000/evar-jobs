
<div class="tab-pane fade" id="pills-address" role="tabpanel" aria-labelledby="pills-address-tab">
   <h3>Адрес</h3>

   <div class="w-100-50">  {{-- w-100-50 Start--}}
      <div class="w-50-inner address-block"> {{-- Address Block Start--}}
         <div class="width-100">
            <label>Адрес по прописке<span>*</span></label>
            <select name="city1" class="cv-select" data-placeholder="Город" id="city1">
              <option></option>
              @include('home.cv.cities');
            </select>
         </div>

         <div class="width-100 mt-18px">
            <label>Район</label>
            <input class="cv-input" type="text" name="area1" />
         </div>

         <div class="width-100 mt-18px">
            <label>Улица/Массив/Квартал<span>*</span></label>
            <input class="cv-input" type="text" name="street1" />
         </div>

         <div class="w-100-50 mt-18px">
            <div class="w-50-inner">
               <div class="width-100">
                  <label>Дом</label>
                  <input class="cv-input" type="text" name="appartment1" />
               </div>
            </div>

            <div class="w-50-inner">
               <div class="width-100">
                  <label>Квартира</label>
                  <input class="cv-input" type="text" name="flat1" />
               </div>
            </div>
         </div>
      </div>  {{-- Address Block End--}}


      <div class="w-50-inner address-block" id="additional_address"> {{-- Additional Address Block Start--}}
         <div class="width-100">
            <label>Фактический адрес проживания<span>*</span></label>
            <select name="city2" class="cv-select" data-placeholder="Город" id="city2">
              <option></option>
              @include('home.cv.cities');
            </select>
         </div>

         <div class="width-100 mt-18px">
            <label>Район</label>
            <input class="cv-input" type="text" name="area2" />
         </div>

         <div class="width-100 mt-18px">
            <label>Улица/Массив/Квартал<span>*</span></label>
            <input class="cv-input" type="text" name="street2" />
         </div>

         <div class="w-100-50 mt-18px">
            <div class="w-50-inner">
               <div class="width-100">
                  <label>Дом</label>
                  <input class="cv-input" type="text" name="appartment2" />
               </div>
            </div>

            <div class="w-50-inner">
               <div class="width-100">
                  <label>Квартира</label>
                  <input class="cv-input" type="text" name="flat2" />
               </div>
            </div>
         </div>

      </div>  {{-- Additional Address Block End--}}
   </div>  {{-- w-100-50 End--}}

   <div class="mt-18px addit_addr_quest_container">  {{-- Additional Address Question Container Start--}}
      <div class="w-50-inner">
         <label>Вы проживаете по адресу прописки?<span>*</span></label>
         <div>
           <input class="cv-radio" type="radio" name="living_in_registrated_address" id="registrated_address_false"
             value="0" />
           <label for="registrated_address_false" id="reg_add_false_label">Нет</label>
           <input class="cv-radio" type="radio" name="living_in_registrated_address" id="registrated_address_true"
             value="1" />
           <label for="registrated_address_true">Да</label>
         </div>
      </div>
    </div> {{-- Additional Address Question Container End--}}

    <div class="cv-form-navigations">
      <button class="button thirdinary-button" type="button" onclick="form_previous_tab('pills-position-tab')">Назад</button>
      <button class="button main-button" id="btn-address-next" type="button" onclick="form_next_tab()">Далее</button>
   </div>

</div>