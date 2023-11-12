
<div class="tab-pane fade" id="pills-additional" role="tabpanel" aria-labelledby="pills-additional-tab">
   <h3>Дополнительно</h3>

   <div class="w-100-25">  {{-- w-100-25 Start --}}
      <div class="w-25-inner">
         <div class="width-100">
            <label>Хронические заболевания</label>
            <div class="additional_radios_container">
               <input class="cv-radio" type="radio" name="diseases" id="no_diseases" value="0" />
               <label for="no_diseases" class="radios-left-label">Нет</label>
               <input class="cv-radio" type="radio" name="diseases" id="has_diseases" value="1" />
               <label for="has_diseases">Да</label>
            </div>
            <input type="text" class="cv-input mt-18px" name="diseases_description" id="diseases_description"
            placeholder="Какие?" />
         </div>
      </div>

      <div class="w-25-inner">
         <div class="width-100">
            <label>Аллергия на химию и продукты</label>
            <div class="additional_radios_container">
               <input class="cv-radio" type="radio" name="allergy" id="no_allergy" value="0" />
               <label for="no_allergy" class="radios-left-label">Нет</label>
               <input class="cv-radio" type="radio" name="allergy" id="has_allergy" value="1" />
               <label for="has_allergy">Да</label>
            </div>
            <input type="text" class="cv-input mt-18px" name="allergy_description" id="allergy_description"
            placeholder="На что?" />
         </div>
      </div>

      <div class="w-25-inner">
         <div class="width-100">
            <label>Беременность</label>
            <div class="additional_radios_container">
               <input class="cv-radio" type="radio" name="pregnant" id="isnt_pregnant" value="0" />
               <label for="isnt_pregnant" class="radios-left-label">Нет</label>
               <input class="cv-radio" type="radio" name="pregnant" id="is_pregnant" value="1" />
               <label for="is_pregnant">Да</label>
            </div>
            <input type="text" class="cv-input mt-18px" name="pregnant_description" id="pregnant_description"
            placeholder="Какой срок?" />
         </div>
      </div>


      <div class="w-25-inner">
         <div class="width-100">
            <label>Была ли у вас судимость?</label>
            <div class="additional_radios_container">
               <input class="cv-radio" type="radio" name="criminal" id="no_criminal" value="0" />
               <label for="no_criminal" class="radios-left-label">Нет</label>
               <input class="cv-radio" type="radio" name="criminal" id="has_criminal" value="1" />
               <label for="has_criminal">Да</label>
            </div>
            <input type="text" class="cv-input mt-18px" name="criminal_description" id="criminal_description"
            placeholder="Укажите статью" />
         </div>
      </div>

   </div> {{-- w-100-25 End --}}

   <div class="cv-form-navigations">
      <button class="button thirdinary-button" type="button" onclick="form_previous_tab('pills-experience-tab')">Назад</button>
      <button class="button main-button" id="btn-additional-next" type="button" onclick="form_next_tab()">Далее</button>
   </div>

</div>