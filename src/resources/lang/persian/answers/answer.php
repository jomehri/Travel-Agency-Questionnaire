<?php

return [

    'validations' => [

        'answerIsRequired' => 'پاسخ نمی تواند خالی باشد.',
    ],

    'exceptions' => [
        'youNeedToBuyQuestionGroupFirst' => 'این دسته از سوالات رایگان نیست. قیمت آن :price ریال میباشد. شما میبایست ابتدا آن را خریداری نمایید.',
        'youNeedToAnswerTheseRequiredQuestionsFirst' => 'پاسخ سوالات شماره :ids الزامی است. ابتدا آن ها را پاسخ نمایید.',
        'answeringNotStartedYet' => 'شما هنوز اقدام به پاسخ به سوالات این دسته نکرده اید. ابتدا پاسخ سوالات را شروع نمایید.',
        'answeringAlreadyFinished' => 'این دسته سوالات قبلا توسط شما پاسخ داده شده و ارسال شده است.',
    ],

];
