
<div class="tab-pane fade" id="pills-send" role="tabpanel" aria-labelledby="pills-send-tab">
   <div class="width-100">
      <label>Есть ли у вас близкие родственники, работаящие в компании ООО "ЁВАР"? (Если да, укажите ФИО и место
         работы, пожалуйста.)
      </label>

      <div class="relatives-question-container">
         <input class="cv-radio" type="radio" name="relative" id="no_relative" value="0" />
         <label class="radios-left-label" for="no_relative">Нет</label>
         <input class="cv-radio" type="radio" name="relative" id="has_relative" value="1" />
         <label for="has_relative">Да</label>
      </div>

      <div id="relatives-div">
         <div class="w-50-inner mt-18px">
            <div class="width-100">
               <label>Ф.И.О</label>
               <input type="text" class="cv-input" name="relative_name" />
            </div>
         </div>
         <div class="w-50-inner mt-18px">
            <div class="width-100">
               <label>Должность</label>
               <input type="text" class="cv-input" name="relative_position" />
            </div>
         </div>
      </div>

      <div class="width-100 mt-18px">
         <label class="mt-18px">Ваш комментарий или сообщение нам.</label>
         <textarea class="cv-input width-100" name="comment" rows="5"></textarea>
      </div>

      <div class="form_submit_container">
         <button class="button main-button" type="button" onclick="form_previous_tab('pills-additional-tab')">Назад</button>
         <button class="button submit-button" type="submit" id="submit-btn">Отправить</button>
       </div>

   </div>
</div>