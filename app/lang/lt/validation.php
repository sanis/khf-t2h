<?php

return array(

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

	"accepted"         => ":attribute turi būti patvirtintas.",
	"active_url"       => ":attribute nėra teisingas URL adresas.",
	"after"            => ":attribute turi būti vėlesnė nei :date.",
	"alpha"            => ":attribute turi būti sudarytas tik iš raidžių.",
	"alpha_dash"       => ":attribute turi būti sudarytas tik iš raidžių, skaičių ir brūkšnelių.",
	"alpha_num"        => ":attribute turi būti sudarytas tik iš raidžių ir skaičių.",
	"array"            => ":attribute turi būti masyvas.",
	"before"           => ":attribute turi būti ankstesnė nei :date.",
	"between"          => array(
		"numeric" => ":attribute turi būti tarp :min ir :max.",
		"file"    => ":attribute turi būti tarp :min ir :max kilobaitų.",
		"string"  => ":attribute turi būti tarp :min ir :max simbolių.",
		"array"   => ":attribute turi būti tarp :min ir :max narių.",
	),
	"confirmed"        => ":attribute patvritinimas nesutampa.",
	"date"             => ":attribute nėra teisinga data.",
	"date_format"      => ":attribute neatitinka datos formato :format.",
	"different"        => ":attribute ir :other turi būti skirtingi.",
	"digits"           => ":attribute turi būti iš :digits skaitmenų.",
	"digits_between"   => ":attribute turi būti tarp :min ir :max skaitmenų.",
	"email"            => ":attribute formatas neteisingas.",
	"exists"           => "Pasirinktas :attribute yra neteisingas.",
	"image"            => ":attribute turi būti paveikslėlis.",
	"in"               => "Pasirinktas :attribute yra neteisingas.",
	"integer"          => ":attribute tur būti sveikasis skaičius.",
	"ip"               => ":attribute turi būti teisingas IP adresas.",
	"max"              => array(
		"numeric" => ":attribute turi būti ne didesnis nei :max.",
		"file"    => ":attribute turi būti ne didesnis nei :max kilobaitų.",
		"string"  => ":attribute ne ilgesnis nei :max simbolių.",
		"array"   => ":attribute neturi būti daugiau nei :max narių.",
	),
	"mimes"            => ":attribute turi būti vienas iš šių failų tipų: :values.",
	"min"              => array(
		"numeric" => ":attribute turi būti bent :min.",
		"file"    => ":attribute turi būti bent :min kilobaitų.",
		"string"  => ":attribute turi būti bent :min simbolių.",
		"array"   => ":attribute turi turėti bent :min narių.",
	),
	"not_in"           => "Pasirinktas :attribute yra neteisingas.",
	"numeric"          => ":attribute turi būti skaičius.",
	"regex"            => ":attribute formatas yra neteisingas.",
	"required"         => ":attribute laukelis yra reikalingas.",
	"required_if"      => ":attribute yra reikalingas kai :other yra :value.",
	"required_with"    => ":attribute yra reikalingas kai :values reikšmė yra nurodyta.",
	"required_without" => ":attribute yra reikalingas kai :values reikšmė yra nenurodyta.",
	"same"             => ":attribute ir :other turi sutapti.",
	"size"             => array(
		"numeric" => ":attribute turi būti :size.",
		"file"    => ":attribute turi būti :size kilobaitų.",
		"string"  => ":attribute turi būti iš :size simbolių.",
		"array"   => ":attribute turi būti iš :size narių.",
	),
	"unique"           => ":attribute jau užimtas.",
	"url"              => ":attribute formatas yra neteisingas.",

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

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
