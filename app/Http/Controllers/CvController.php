<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;

class CvController extends Controller
{
    public function download_template()
    {
        $path = public_path('cv_template/template.doc');

        return response()->download($path, 'Шаблон анкеты Ёвар.doc');
    }

    public function store(Request $request)
    {
        //Generate needed text from request (combine inputs)
        $name = $request->surname . ' ' . $request->name . ' ' . $request->patronymic;
        $birthday = request('bday-day') . ' ' . request('bday-month') . ' ' . request('bday-year');

        $appartment1 = 'дом ' . $request->appartment1 . ' кв. ' . $request->flat1;
        $appartment2 = 'дом ' . $request->appartment2 . ' кв. ' . $request->flat2;

        $job1_begin = request('job1-beginning-month') . ' ' . request('job1-beginning-year');
        $job1_end = request('job1-finished-month') . ' ' . request('job1-finished-year');

        $job2_begin = request('job2-beginning-month') . ' ' . request('job2-beginning-year');
        $job2_end = request('job2-finished-month') . ' ' . request('job2-finished-year');

        $childsCount = 0;
        if (request('childs')) $childsCount = request('childs-count');

        $cv = Cv::create([
            'name' => $name,
            'birthday' => $birthday,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'email' => $request->email,
            'photo' => 'Ошибка',
            'married' => $request->married,
            'got_childs' => $request->childs,
            'childs_count' => $childsCount,
            'position_id' => $request->position,
            'city1' => $request->city1,
            'area1' => $request->area1,
            'street1' => $request->street1,
            'appartment1' => $appartment1,
            'registrated_address' => $request->living_in_registrated_address,
            'city2' => $request->city2,
            'area2' => $request->area2,
            'street2' => $request->street2,
            'appartment2' => $appartment2,
            'education1_lvl' => request('education1-lvl'),
            'education1_inst_name' => request('education1-institution-name'),
            'education1_spec' => request('education1-specialization'),
            'education1_begin' => request('education1-beginning'),
            'education1_end' => request('education1-finished'),
            'education2_lvl' => request('education2-lvl'),
            'education2_inst_name' => request('education2-institution-name'),
            'education2_spec' => request('education2-specialization'),
            'education2_begin' => request('education2-beginning'),
            'education2_end' => request('education2-finished'),
            'tajik' => request('tajik-lvl'),
            'russian' => request('russian-lvl'),
            'english' => request('english-lvl'),
            'experienced' => $request->experienced,
            'job1_org' => request('job1-organization'),
            'job1_position' => request('job1-position'),
            'job1_duties' => request('job1-duties'),
            'job1_begin' => $job1_begin,
            'job1_end' => $job1_end,
            'job2_org' => request('job2-organization'),
            'job2_position' => request('job2-position'),
            'job2_duties' => request('job2-duties'),
            'job2_begin' => $job2_begin,
            'job2_end' => $job2_end,
            'diseases' => $request->diseases,
            'allergy' => $request->allergy,
            'pregnant' => $request->pregnant,
            'criminal' => $request->criminal,
            'diseases_desc' => $request->diseases_description,
            'allergy_desc' => $request->allergy_description,
            'pregnant_desc' => $request->pregnant_description,
            'criminal_desc' => $request->criminal_description,
            'relative' => $request->relative,
            'rel_name' => $request->relative_name,
            'rel_position' => $request->relative_position,
            'comment' => $request->comment,
        ]);

        session()->flash('alert', 'Ваша анкета успешно опубликована!');

        //users photo
        $photo = $request->file('photo');
        $photoName = $cv->id . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('img/private/candidates'), $photoName);

        //change photo in db
        $cv->photo = $photoName;
        $cv->save();

        return redirect()->back();
    }

    public function webmaster_single($id)
    {
        $cv = Cv::find($id);
        $cv->new = false;
        $cv->save();

        return view("dashboard.cvs.single", compact("cv"));
    }

    public function download_in_word()
    {
        $cv = Cv::find(request('id'));

        //Download filled cvs by MsWord format
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        // Set Default font style
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(14);

        // Set new bold font style
        $bold = 'bold';
        $phpWord->addFontStyle(
            $bold,
            array('bold' => true)
        );

        // Set new font style for mainTitle
        $mainTitle = 'mainTitle';
        $phpWord->addFontStyle(
            $mainTitle,
            array('bold' => true, 'size' => 17)
        );

        $section = $phpWord->addSection();

        //MainTitle
        $textrun = $section->addTextRun();
        $textrun->addText($cv->name, $mainTitle);
        $textrun->addTextBreak(1);

        //Personal Info
        $textrun = $section->addTextRun();
        $textrun->addText('Ф.И.О : ', $bold);
        $textrun->addText($cv->name);
        $textrun->addTextBreak(0);

        $textrun = $section->addTextRun();
        $textrun->addText('Дата рождения : ', $bold);
        $textrun->addText($cv->birthday);
        $textrun->addTextBreak(0);

        if ($cv->phone2 == '') {
            $textrun = $section->addTextRun();
            $textrun->addText('Телефон : ', $bold);
            $textrun->addText($cv->phone1);
        } else {
            $textrun = $section->addTextRun();
            $textrun->addText('Телефон : ', $bold);
            $textrun->addText('Основной -- ' . $cv->phone1 . ' | Дополнительный -- ' . $cv->phone2);
        }
        $textrun->addTextBreak(0);

        if ($cv->email != '') {
            $textrun = $section->addTextRun();
            $textrun->addText('E-maiL : ', $bold);
            $textrun->addText($cv->email);
            $textrun->addTextBreak(0);
        }

        if ($cv->married) {
            $textrun = $section->addTextRun();
            $textrun->addText('Семейное положение : ', $bold);
            $textrun->addText('Женат/Замужем. Количество детей : ' . $cv->childs_count);
        } else {
            $textrun = $section->addTextRun();
            $textrun->addText('Семейное положение : ', $bold);
            $textrun->addText('Не женат/Не замужем. Количество детей : ' . $cv->childs_count);
        }
        $textrun->addTextBreak(0);

        $textrun = $section->addTextRun();
        $textrun->addText('Претендует на должность : ', $bold);
        if($cv->position == null) {
            $textrun->addText('Должность удалена !');
        }
        else {
            $textrun->addText($cv->position->name);
        }
        $textrun->addTextBreak(1);

        // Address 
        if ($cv->registrated_address) {
            $regAdrAns = 'Да';
            $currentAdrTitle = 'Адрес по прописке : ';
            $currentAdr = 'г. ' . $cv->city1 . ' ' . $cv->street1 . ' ' . $cv->appartment1;
        } else {
            $regAdrAns = 'Нет';
            $currentAdrTitle = 'Фактический адрес проживания : ';
            $currentAdr = 'г. ' . $cv->city2 . ' ' . $cv->street2 . ' ' . $cv->appartment2;
        }

        $textrun = $section->addTextRun();
        $textrun->addText('Проживает по адресу прописки : ', $bold);
        $textrun->addText($regAdrAns);
        $textrun->addTextBreak(0);

        $textrun = $section->addTextRun();
        $textrun->addText($currentAdrTitle, $bold);
        $textrun->addText($currentAdr);
        $textrun->addTextBreak(1);


        // Education
        $education1_lvl = $cv->education1_lvl;
        if ($education1_lvl == '0') $ed1Lvl = 'Среднее (школа, лицей)';
        elseif ($education1_lvl == '1') $ed1Lvl = 'Среднее - специальное (колледж)';
        else $ed1Lvl = 'Высшее (бакалаврият, магистратура)';

        $textrun = $section->addTextRun();
        $textrun->addText('Уровень образования : ', $bold);
        $textrun->addText($ed1Lvl);
        $textrun->addTextBreak(0);

        $textrun = $section->addTextRun();
        $textrun->addText('Наименование учебного завидение : ', $bold);
        $textrun->addText($cv->education1_inst_name);
        $textrun->addTextBreak(0);

        if ($cv->education1_spec != '') {
            $textrun = $section->addTextRun();
            $textrun->addText('Специализация : ', $bold);
            $textrun->addText($cv->education1_spec);
            $textrun->addTextBreak(0);
        }

        $textrun = $section->addTextRun();
        $textrun->addText('Год обучения : ', $bold);
        $textrun->addText($cv->education1_begin . ' - ' . $cv->education1_end);
        $textrun->addTextBreak(1);

        //LANGUAGES
        $tajik = $cv->tajik;
        if ($tajik == '1') $tajLvl = 'отлично';
        elseif ($tajik == '2') $tajLvl = 'хорошо';
        else $tajLvl = 'плохо';

        $russian = $cv->russian;
        if ($russian == '1') $ruLvl = 'отлично';
        elseif ($russian == '2') $ruLvl = 'хорошо';
        else $ruLvl = 'плохо';

        $english = $cv->english;
        if ($english == '1') $engLvl = 'отлично';
        elseif ($english == '2') $engLvl = 'хорошо';
        else $engLvl = 'плохо';

        $textrun = $section->addTextRun();
        $textrun->addText('Знание языков : ', $bold);
        $textrun->addText('Таджикский -- ' . $tajLvl . ' | Русский -- ' . $ruLvl . ' | Английский -- ' . $engLvl);
        $textrun->addTextBreak(1);

        //EXPERIENCE

        if ($cv->experienced) {
            $textrun = $section->addTextRun();
            $textrun->addText('Опыт работы : ', $bold);
            $textrun->addText('Имеется');
            $textrun->addTextBreak(0);

            $textrun = $section->addTextRun();
            $textrun->addText('Организация : ', $bold);
            $textrun->addText($cv->job1_org);
            $textrun->addTextBreak(0);

            $textrun = $section->addTextRun();
            $textrun->addText('Должность : ', $bold);
            $textrun->addText($cv->job1_position);
            $textrun->addTextBreak(0);

            $textrun = $section->addTextRun();
            $textrun->addText('Дата приёма и увольнения : ', $bold);
            $textrun->addText($cv->job1_begin . ' - ' . $cv->job1_end);
        } else {
            $textrun = $section->addTextRun();
            $textrun->addText('Опыт работы : ', $bold);
            $textrun->addText('Не имеется');
        }
        $textrun->addTextBreak(1);

        //Additional
        if ($cv->relative) {
            $textrun = $section->addTextRun();
            $textrun->addText('Близкие родственники работающие в компании ООО "ЁВАР" : ', $bold);
            $textrun->addText('Есть');
            $textrun->addTextBreak(0);

            $textrun = $section->addTextRun();
            $textrun->addText('Ф.И.О родственника : ', $bold);
            $textrun->addText($cv->rel_name);
            $textrun->addTextBreak(0);

            $textrun = $section->addTextRun();
            $textrun->addText('Должность родственника : ', $bold);
            $textrun->addText($cv->rel_position);
            $textrun->addTextBreak(0);
        } else {
            $textrun = $section->addTextRun();
            $textrun->addText('Близкие родственники работающие в компании ООО "ЁВАР" : ', $bold);
            $textrun->addText('Нету');
        }

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('MWord' . '/' . $cv->name . '.docx');
        return response()->download(public_path('MWord' . '/' . $cv->name . '.docx'));
    }


    public function remove(Request $request)
    {
        Cv::find($request->id)->delete();

        return redirect()->route("dashboard.index");
    }

    public function remove_multiple(Request $request)
    {
        foreach($request->ids as $id) {
            Cv::find($id)->delete();
        }

        return redirect()->back();
    }

}
