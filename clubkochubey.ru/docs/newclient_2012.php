<?php

$ret="<p class='error'>";
$noerrors=true;

$chname=Array(
"fsurname",
"fname",
"fpatronymic",
"fcompanyname",
"fposition",
"femail"
);
$chnameru=Array(
"Фамилия",
"Имя",
"Отчество",
"Навание компании",
"Должность",
"E-mail"
);

for ($i=0;$i<6;$i++)
{
  if ($_POST[$chname[$i]]=="")
  {
    $ret.="Поле \"".$chnameru[$i]."\" обязательно для заполнения<br>";
    $noerrors=false;
  }
};
/*if ($noerrors&&!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST["femail"]))
{
        $ret.="E-mail введен неправильно<br>";
    $noerrors=false;
}     */

$ret.="</p>";

if ($noerrors)
{

$subject = "Прием заявки от:".$_POST["fsurname"];
$message = '
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru">
<html>
    <head>
        <title>Заявка нового клиента</title>
    </head>
    <body>

        <table cellspacing="2" cellpadding="2" border="1">
<tr >
        <td align="right">Фамилия*</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsurname"]).'</td>
</tr>
<tr>
        <td align="right">Имя*</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fname"]).'</td>
</tr>
<tr>
        <td align="right">Отчество*</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fpatronymic"]).'</td>
</tr>
<tr>
        <td align="right">Навание компании*</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fcompanyname"]).'</td>
</tr>

<tr>
        <td align="right">Должность*</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fposition"]).'</td>
</tr>

<tr>
        <td align="right">E-mail*</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["femail"]).'</td>
</tr>
<tr>
        <td align="right">Тенденции рынка труда. Круглый стол с участием представителей рекрутинга.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse1"]).'</td>
</tr>
<tr>
        <td align="right">Executive search: рынок топ-менеджеров-2012.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse2"]).'</td>
</tr>
<tr>
        <td align="right">Взаимодействие с УФМС и прием на работу иностранных граждан.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse3"]).'</td>
</tr>
<tr>
        <td align="right">Инструменты определения лояльности соискателя.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse4"]).'</td>
</tr>
<tr>
        <td align="right">Интервью с кандидатом: структура, разработка, методы, анализ результатов.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse5"]).'</td>
</tr>
<tr>
        <td align="right">Отдел подбора персонала и оценка эффективности его работы.ю с кандидатом: структура, разработка, методы, анализ результатов.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse6"]).'</td>
</tr>
<tr>
        <td align="right">Оценка трудозатрат на поиск, подбор и отбор персонала.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse7"]).'</td>
</tr>
<tr>
        <td align="right">Формирование отдела подбора персонала vs аутсорсинг процесса подбора. Качественные и количественные выгоды.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse8"]).'</td>
</tr>
<tr>
        <td align="right">Работа с молодыми специалистами как инвестиции в будущее компании. Программы стажировок и практик и ярмарки вакансий для студентов и выпускников.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse9"]).'</td>
</tr>
<tr>
        <td align="right">Автоматизация адаптации: компьютерный курс "молодого бойца".</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse10"]).'</td>
</tr>
<tr>
        <td align="right">Адаптация персонала: системный подход, примеры успешного внедрения программ адаптации.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse11"]).'</td>
</tr>
<tr>
        <td align="right">Отраслевые особенности внедрения процесса обучения персонала.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse12"]).'</td>
</tr>
<tr>
        <td align="right">Этапы создания системы внутрикорпоративного обучения. Факторы успешного процесса внедрения и риски, с которыми возможно столкнуться.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse13"]).'</td>
</tr>
<tr>
        <td align="right">Как найти и удержать лучших сотрудников: опыт построения в компании системы управления талантами.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse14"]).'</td>
</tr>
<tr>
        <td align="right">Кадровый резерв: создание и позиционирование, разработка критериев.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse15"]).'</td>
</tr>
<tr>
        <td align="right">Проблемы формирования резерва "под должность" и "под задачу".</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse16"]).'</td>
</tr>
<tr>
        <td align="right">Методология и этапы разработки корпоративных программ обучения.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse17"]).'</td>
</tr>
<tr>
        <td align="right">Развитие персонала в компании при ограниченных бюджетах.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse18"]).'</td>
</tr>
<tr>
        <td align="right">Коучинг и наставничество как инструменты развития персонала.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse19"]).'</td>
</tr>
<tr>
        <td align="right">Тенденции рынка обучения. Круглый стол с участием представителей тренинговых компаний.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse20"]).'</td>
</tr>
<tr>
        <td align="right">Оценка персонала с использованием KPI. Оценка персонала на массовые позиции. Оценка руководителей. Оценка специалистов среднего звена. Оценка топ-менеджеров.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse21"]).'</td>
</tr>
<tr>
        <td align="right">Особенности аттестации работников различного иерархического уровня: от уборщицы до ген. директора.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse22"]).'</td>
</tr>
<tr>
        <td align="right">Методы оценки личностных и профессиональных качеств кандидатов. Кого мы берем на работу в первую очередь: специалиста или человека?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse23"]).'</td>
</tr>
<tr>
        <td align="right">Аттестация персонала в целях развития персонала и формирования кадрового резерва.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse24"]).'</td>
</tr>
<tr>
        <td align="right">Методы оценки и прогноза лидерского потенциала.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse25"]).'</td>
</tr>
<tr>
        <td align="right">Оценка по методу 360 применительно к лояльности и мотивированности.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse26"]).'</td>
</tr>
<tr>
        <td align="right">Работа проектной группы: мотивация, система оценки.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse27"]).'</td>
</tr>
<tr>
        <td align="right">Внутренняя коммуникация в компании в период перемен: содержательные изменения, или чего не стоит знать сотрудникам.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse28"]).'</td>
</tr>
<tr>
        <td align="right">Горизонтальные и вертикальные коммуникации: взаимодействие между структурными подразделениями.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse29"]).'</td>
</tr>
<tr>
        <td align="right">Бренд работодателя: взаимодействие отдела маркетинга и службы персонала.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse30"]).'</td>
</tr>
<tr>
        <td align="right">Основные аспекты эффективных внутренних коммуникаций.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse31"]).'</td>
</tr>
<tr>
        <td align="right">Иммунитет к изменениям в организации. Есть ли он у сотрудников и как его выработать?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse32"]).'</td>
</tr>
<tr>
        <td align="right">Социометрия: как улучшить климат в компании?(управление офисными конфликтами).</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse33"]).'</td>
</tr>
<tr>
        <td align="right">Практика решения трудовых споров. Юридические аспекты управления персоналом. Подводные камни ТКРФ.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse34"]).'</td>
</tr>
<tr>
        <td align="right">Пути повышения эффективности взаимодействия собственника, совета директоров, топ-менеджмента.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse35"]).'</td>
</tr>
<tr>
        <td align="right">Аудит действующей компенсационной политики производственной компании и оценка ее эффективности на данном этапе ее развития.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse36"]).'</td>
</tr>
<tr>
        <td align="right">Разработка компенсационной политики в соответствии с кадровой и бизнес-стратегией организации.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse37"]).'</td>
</tr>
<tr>
        <td align="right">Повышение производительности труда.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse38"]).'</td>
</tr>
<tr>
        <td align="right">Как мотивировать продавцов: взгляд HR-а и взгляд руководителя отдела продаж.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse39"]).'</td>
</tr>
<tr>
        <td align="right">Системы мотивации персонала, работающего без оклада/ на фиксированном окладе. Различие взглядов работника и работодателя.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse40"]).'</td>
</tr>
<tr>
        <td align="right">Как сохранить ценных сотрудников, если нет возможности платить им рыночную зарплату: не затратные способы формирования социального пакета. Нематериальная мотивация. Взгляд сотрудника vs взгляд работодателя.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse41"]).'</td>
</tr>
<tr>
        <td align="right">Мотивация на обучение: почему обучение превращается в «соцпакет».</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse42"]).'</td>
</tr>
<tr>
        <td align="right">Грейдирование: подводные камни процесса разработки и внедрения. Методика грейдирования Эдуарда Хэя и опыт HayGroup.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse43"]).'</td>
</tr>
<tr>
        <td align="right">Влияние используемой предприятием системы мотивации сотрудников на экономические результаты деятельности компании.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse44"]).'</td>
</tr>
<tr>
        <td align="right">Обзор заработных плат и компенсаций: кому и сколько платят в 2012 году.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse45"]).'</td>
</tr>
<tr>
        <td align="right">Управление расходами на персонал.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse46"]).'</td>
</tr>
<tr>
        <td align="right">Юридические аспекты: оформление трудовых контрактов, прописание в контактах переменной части(KPI).</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse47"]).'</td>
</tr>
<tr>
        <td align="right">HR-бенчмаркинг.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse48"]).'</td>
</tr>
<tr>
        <td align="right">HR-бюджет: составить и отстоять.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse49"]).'</td>
</tr>
<tr>
        <td align="right">Методы выживания для кадровых служб, или самые популярные способы снижения затрат в отделе персонала.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse50"]).'</td>
</tr>
<tr>
        <td align="right">Как построить великую компанию? Точка зрения HR.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse51"]).'</td>
</tr>
<tr>
        <td align="right">HR-аудит: экспресс методы.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse52"]).'</td>
</tr>
<tr>
        <td align="right">KPI для HR.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse53"]).'</td>
</tr>
<tr>
        <td align="right">Охрана и безопасность труда: медосмотры, несчастные случаи, аттестация рабочих мест. Чья это ответственность: служба персонала или служба безопасности?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse54"]).'</td>
</tr>
<tr>
        <td align="right">Как сформировать эффективную управленческую команду? Имеет ли служба персонала влияние на ТОП-менеджмент в компании?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse55"]).'</td>
</tr>
<tr>
        <td align="right">Управление численностью и проекты по нормированию труда.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse56"]).'</td>
</tr>
<tr>
        <td align="right">Performance management: реализация стратегии компании через управление эффективностью.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse57"]).'</td>
</tr>
<tr>
        <td align="right">Оптимизация и автоматизация кадрового документооборота. Автоматизация HR-функций - основа для реального управления затратами на персонал.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse58"]).'</td>
</tr>
<tr>
        <td align="right">Внутренний корпоративный портал: новые возможности и экономия средств. Этапы создания Интранет-портала. Как измерить эффективность корпоративного портала?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse59"]).'</td>
</tr>
<tr>
        <td align="right">Особенности формирования корпоративной культуры на производственных (торговых и т.д.) предприятиях (отраслевой срез).</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse60"]).'</td>
</tr>
<tr>
        <td align="right">Корпоративная модель компетенций. Круглый стол.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse61"]).'</td>
</tr>
<tr>
        <td align="right">Целевое управление (GOAL-технология) как инструмент управления персоналом.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse62"]).'</td>
</tr>
<tr>
        <td align="right">Инновации в HR: новые тенденции.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse63"]).'</td>
</tr>
<tr>
        <td align="right">Что такое HR-стратегия?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse64"]).'</td>
</tr>
<tr>
        <td align="right">Аутсорсинг HR-процессов производственных предприятий: опыт, итоги и перспективы.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse65"]).'</td>
</tr>
<tr>
        <td align="right">Сертификация HR-менеджеров.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse66"]).'</td>
</tr>
<tr>
        <td align="right">Тематический Круглый стол "Особенности рынка труда и управления персоналом в розничных сетях".</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse67"]).'</td>
</tr>
<tr>
        <td align="right">Кадровый менеджмент в спорте.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse68"]).'</td>
</tr>
<tr>
        <td align="right">Почему HR не станет ключевой функцией ни-ког-да?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse69"]).'</td>
</tr>
<tr>
        <td align="right">Библиотека (дискуссионный клуб). Какие книги надо читать?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse70"]).'</td>
</tr>
<tr>
        <td align="right">Направления, методы и способы развития самого HR.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse71"]).'</td>
</tr>
</table>

    </body>
</html>';
$headers  = "Content-type: text/html; charset=windows-1251 \r\n";
$headers .= "From: New client\r\n";
$headers .= "\r\n";
$to  = "rodionova.anastasija@clubkochubey.ru" ;
//$to  = "octane89@mail.ru";
mail($to, $subject, $message, $headers);
echo "ok";
}
else{echo $ret;}

?>