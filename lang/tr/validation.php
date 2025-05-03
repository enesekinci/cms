<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute kabul edilmelidir.',
    'accepted_if' => ':other :value değerine sahip olduğunda :attribute kabul edilmelidir.',
    'active_url' => ':attribute geçerli bir URL olmalıdır.',
    'after' => ':attribute, :date tarihinden sonraki bir tarih olmalıdır.',
    'after_or_equal' => ':attribute, :date tarihi veya sonrası olmalıdır.',
    'alpha' => ':attribute sadece harflerden oluşmalıdır.',
    'alpha_dash' => ':attribute sadece harfler, rakamlar ve tirelerden oluşmalıdır.',
    'alpha_num' => ':attribute sadece harfler ve rakamlar içermelidir.',
    'any_of' => 'The :attribute field is invalid.',
    'array' => ':attribute bir dizi olmalıdır.',
    'ascii' => ':attribute sadece tek baytlı alfanümerik karakterler ve semboller içermelidir.',
    'before' => ':attribute, :date tarihinden önceki bir tarih olmalıdır.',
    'before_or_equal' => ':attribute, :date tarihi veya öncesi olmalıdır.',
    'between' => [
        'array' => ':attribute öğesi :min - :max arasında olmalıdır.',
        'file' => ':attribute :min - :max kilobayt arasında olmalıdır.',
        'numeric' => ':attribute :min - :max arasında olmalıdır.',
        'string' => ':attribute :min - :max karakter arasında olmalıdır.',
    ],
    'boolean' => ':attribute alanı sadece doğru veya yanlış olabilir.',
    'can' => 'The :attribute field contains an unauthorized value.',
    'confirmed' => ':attribute tekrarı eşleşmiyor.',
    'contains' => 'The :attribute field is missing a required value.',
    'current_password' => 'Şifre hatalı.',
    'date' => ':attribute geçerli bir tarih olmalıdır.',
    'date_equals' => ':attribute, :date ile aynı tarih olmalıdır.',
    'date_format' => ':attribute :format biçimi ile eşleşmiyor.',
    'decimal' => ':attribute :decimal ondalık basamak içermelidir.',
    'declined' => ':attribute reddedilmelidir.',
    'declined_if' => ':other :value değerine sahip olduğunda :attribute reddedilmelidir.',
    'different' => ':attribute ile :other birbirinden farklı olmalıdır.',
    'digits' => ':attribute :digits haneli olmalıdır.',
    'digits_between' => ':attribute :min ile :max arasında haneli olmalıdır.',
    'dimensions' => ':attribute görsel boyutları geçersiz.',
    'distinct' => ':attribute alanı yinelenen bir değere sahip.',
    'doesnt_end_with' => ':attribute şu değerlerden biriyle bitemez: :values.',
    'doesnt_start_with' => ':attribute şu değerlerden biriyle başlayamaz: :values.',
    'email' => ':attribute formatı geçersiz.',
    'ends_with' => ':attribute şu değerlerden biriyle bitmelidir: :values.',
    'enum' => 'Seçilen :attribute geçersiz.',
    'exists' => 'Seçilen :attribute geçersiz.',
    'extensions' => 'The :attribute field must have one of the following extensions: :values.',
    'file' => ':attribute bir dosya olmalıdır.',
    'filled' => ':attribute alanı doldurulmalıdır.',
    'gt' => [
        'array' => ':attribute öğesi :value değerinden büyük olmalıdır.',
        'file' => ':attribute :value kilobayttan büyük olmalıdır.',
        'numeric' => ':attribute :value değerinden büyük olmalıdır.',
        'string' => ':attribute :value karakterden uzun olmalıdır.',
    ],
    'gte' => [
        'array' => ':attribute öğesi :value veya daha fazla olmalıdır.',
        'file' => ':attribute :value kilobayt veya daha büyük olmalıdır.',
        'numeric' => ':attribute :value veya daha büyük olmalıdır.',
        'string' => ':attribute :value karakter veya daha uzun olmalıdır.',
    ],
    'hex_color' => 'The :attribute field must be a valid hexadecimal color.',
    'image' => ':attribute bir görsel olmalıdır.',
    'in' => ':attribute değeri geçersiz.',
    'in_array' => ':attribute alanı :other içinde mevcut değil.',
    'integer' => ':attribute tamsayı olmalıdır.',
    'ip' => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4' => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ':attribute geçerli bir IPv6 adresi olmalıdır.',
    'json' => ':attribute geçerli bir JSON dizesi olmalıdır.',
    'list' => 'The :attribute field must be a list.',
    'lowercase' => ':attribute küçük harflerden oluşmalıdır.',
    'lt' => [
        'array' => ':attribute öğesi :value değerinden küçük olmalıdır.',
        'file' => ':attribute :value kilobayttan küçük olmalıdır.',
        'numeric' => ':attribute :value değerinden küçük olmalıdır.',
        'string' => ':attribute :value karakterden kısa olmalıdır.',
    ],
    'lte' => [
        'array' => ':attribute öğesi :value veya daha az olmalıdır.',
        'file' => ':attribute :value kilobayt veya daha küçük olmalıdır.',
        'numeric' => ':attribute :value veya daha küçük olmalıdır.',
        'string' => ':attribute :value karakter veya daha kısa olmalıdır.',
    ],
    'mac_address' => ':attribute geçerli bir MAC adresi olmalıdır.',
    'max' => [
        'array' => ':attribute en fazla :max öğe içerebilir.',
        'file' => ':attribute en fazla :max kilobayt olabilir.',
        'numeric' => ':attribute en fazla :max olabilir.',
        'string' => ':attribute en fazla :max karakter olabilir.',
    ],
    'max_digits' => ':attribute en fazla :max rakam içerebilir.',
    'mimes' => ':attribute :values türünde bir dosya olmalıdır.',
    'mimetypes' => ':attribute :values türünde bir dosya olmalıdır.',
    'min' => [
        'array' => ':attribute en az :min öğe içermelidir.',
        'file' => ':attribute en az :min kilobayt olmalıdır.',
        'numeric' => ':attribute en az :min olmalıdır.',
        'string' => ':attribute en az :min karakter olmalıdır.',
    ],
    'min_digits' => ':attribute en az :min rakam içermelidir.',
    'missing' => ':attribute alanı eksik olmalıdır.',
    'missing_if' => ':other :value değerine sahip olduğunda :attribute alanı eksik olmalıdır.',
    'missing_unless' => ':attribute alanı :other :value değerine sahip olmadığında eksik olmalıdır.',
    'missing_with' => ':values mevcut olduğunda :attribute alanı eksik olmalıdır.',
    'missing_with_all' => ':values mevcut olduğunda :attribute alanı eksik olmalıdır.',
    'multiple_of' => ':attribute :value değerinin katları olmalıdır.',
    'not_in' => 'Seçilen :attribute geçersiz.',
    'not_regex' => ':attribute formatı geçersiz.',
    'numeric' => ':attribute sayı olmalıdır.',
    'password' => [
        'letters' => ':attribute en az bir harf içermelidir.',
        'mixed' => ':attribute en az bir büyük ve bir küçük harf içermelidir.',
        'numbers' => ':attribute en az bir rakam içermelidir.',
        'symbols' => ':attribute en az bir sembol içermelidir.',
        'uncompromised' => 'Verilen :attribute bir veri sızıntısında görünmüştür. Lütfen farklı bir :attribute seçin.',
    ],
    'present' => ':attribute alanı mevcut olmalıdır.',
    'present_if' => 'The :attribute field must be present when :other is :value.',
    'present_unless' => 'The :attribute field must be present unless :other is :value.',
    'present_with' => 'The :attribute field must be present when :values is present.',
    'present_with_all' => 'The :attribute field must be present when :values are present.',
    'prohibited' => ':attribute alanı yasaklıdır.',
    'prohibited_if' => ':other :value değerine sahip olduğunda :attribute alanı yasaklıdır.',
    'prohibited_if_accepted' => 'The :attribute field is prohibited when :other is accepted.',
    'prohibited_if_declined' => 'The :attribute field is prohibited when :other is declined.',
    'prohibited_unless' => ':attribute alanı :other :value değerine sahip olmadığında yasaklıdır.',
    'prohibits' => ':attribute alanı :other alanının mevcut olmasını yasaklar.',
    'regex' => ':attribute formatı geçersiz.',
    'required' => ':attribute alanı gereklidir.',
    'required_array_keys' => ':attribute alanı :values değerlerini içermelidir.',
    'required_if' => ':other :value değerine sahip olduğunda :attribute alanı gereklidir.',
    'required_if_accepted' => ':other kabul edildiğinde :attribute alanı gereklidir.',
    'required_if_declined' => 'The :attribute field is required when :other is declined.',
    'required_unless' => ':other :values değerlerinden birine sahip olmadığında :attribute alanı gereklidir.',
    'required_with' => ':values mevcut olduğunda :attribute alanı gereklidir.',
    'required_with_all' => ':values mevcut olduğunda :attribute alanı gereklidir.',
    'required_without' => ':values mevcut olmadığında :attribute alanı gereklidir.',
    'required_without_all' => ':values mevcut olmadığında :attribute alanı gereklidir.',
    'same' => ':attribute ile :other eşleşmelidir.',
    'size' => [
        'array' => ':attribute :size öğe içermelidir.',
        'file' => ':attribute :size kilobayt olmalıdır.',
        'numeric' => ':attribute :size olmalıdır.',
        'string' => ':attribute :size karakter olmalıdır.',
    ],
    'starts_with' => ':attribute şu değerlerden biriyle başlamalıdır: :values.',
    'string' => ':attribute metin olmalıdır.',
    'timezone' => ':attribute geçerli bir saat dilimi olmalıdır.',
    'unique' => ':attribute daha önceden kayıt edilmiş.',
    'uploaded' => ':attribute yüklenirken hata oluştu.',
    'uppercase' => ':attribute büyük harflerden oluşmalıdır.',
    'url' => ':attribute formatı geçersiz.',
    'ulid' => ':attribute geçerli bir ULID olmalıdır.',
    'uuid' => ':attribute geçerli bir UUID olmalıdır.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'Dil Adı',
        'code' => 'Kısa Kod',
        'is_active' => 'Aktif',
        'edit_name' => 'Dil Adı',
        'edit_code' => 'Kısa Kod',
        'edit_is_active' => 'Aktif',
    ],

];
