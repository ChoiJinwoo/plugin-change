<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//custom_post_type을 설정할 인자들과 라벨 변수

    $pluginName = 'development';

    //metaKey들
    $metaKeyDictionary = array(
        "from_date" => array("유효기간 시작일", "date"),
        "to_date" => array("유효기간 종료일", "date"),
        "do_date" => array("실행/발생일", "date"),
        "validation" => array("현재 유효한 값인가", "binary"),
        "party_post_id" => array("party의 PK값", "post_id"),
        "party_occupier_post_id" => array("점유자인 party의 PK값", "post_id"),
        "party_owner_post_id" => array("소유자인 party의 PK값", "post_id"),
        "role_post_id" => array("role의 PK값", "post_id"),
        "object_post_id" => array("object의 PK값", "post_id"),
        "object_1_post_id" => array("첫번째 object의 PK값", "post_id"),
        "object_2_post_id" => array("두번째 object의 PK값", "post_id"),
        "relation_word" => array("relation에 속하는 word의 PK값", "post_id"),
        "process_word" => array("process에 속하는 word의 PK값", "post_id"),
        "product_post_id" => array("product의 PK값", "post_id"),
        "product_post_id_amount" => array("product의 amount", "numeric"),
        "product_1_post_id" => array("첫번째 product의 PK값", "post_id"),
        "product_2_post_id" => array("두번째 product의 PK값", "post_id"),
        "product_1_post_id_amount" => array("첫번째 product의 amount", "numeric"),
        "product_2_post_id_amount" => array("두번째 product의 amount", "numeric"),
        "product_goal_post_id" => array("제작하고자 하는 product의 PK값", "post_id"),
        "product_process_transaction_id" => array("같은 transaction으로 추가되는 product_process_custom_type의 공통id값", "autoincrement_id"),
        "product_process_package_id" => array("같은 묶음으로 취급되는 공통id값", "autoincrement_id"),
        "area_post_id" => array("area의 PK값", "post_id")
    );
     /* @var $metaKeyName type - key 와 value가 같다. 
      * 정의된 metaKey만 customPostType에 연관시키기위해 필요하다.
      */
    while (current($metaKeyDictionary)) {
            $metaKeyName[key($metaKeyDictionary)] = key($metaKeyDictionary);
            next($metaKeyDictionary);
    }

    //custom_post_type들의 명칭.
    $customPostType = array(
        array(
        'custom_name' => "관계자",
        'custom_type' => "party",
        'meta_key' => array($metaKeyName["validation"],
            )),
        array(
        'custom_name' => "역할",
        'custom_type' => "role",
        'meta_key' => array($metaKeyName["validation"],
            )),
        array(
        'custom_name' => "객체",
        'custom_type' => "object",
        'meta_key' => array($metaKeyName["validation"],
            )),
        array(
        'custom_name' => "제품",
        'custom_type' => "product",
        'meta_key' => array($metaKeyName["validation"],
                            $metaKeyName["from_date"],
                            $metaKeyName["to_date"],
                            $metaKeyName["object_post_id"],
            )),
        array(
        'custom_name' => "단어",
        'custom_type' => "word",
        'meta_key' => array($metaKeyName["validation"],
            )),
        array(
        'custom_name' => "제품공정",
        'custom_type' => "product_process",
        'meta_key' => array($metaKeyName["validation"],
                    $metaKeyName["do_date"],
                    $metaKeyName["product_process_transaction_id"],
                    $metaKeyName["product_process_package_id"],
                    $metaKeyName["product_post_id"],
                    $metaKeyName["product_post_id_amount"],
                    $metaKeyName["process_word"],
                    $metaKeyName["product_goal_post_id"],
                    $metaKeyName["party_occupier_post_id"],
                    $metaKeyName["party_owner_post_id"],
                    $metaKeyName["area_post_id"],
            )),
        array(
        'custom_name' => "장소",
        'custom_type' => "area",
        'meta_key' => array($metaKeyName["validation"],
            )),
        array(
        'custom_name' => "연락처",
        'custom_type' => "contact",
        'meta_key' => array($metaKeyName["validation"],
            )),
        array(
	"custom_name" => "추가포스트타입",
	'custom_type' => "area",
	'meta_key' => array($metaKeyName["validation"],
	)),    
	);

   /* @var $customType custom_post_type중 주로 사용하는 필드는 custom_type이다. 
    * custom_type 정리해서 option으로 등록할 수 있게 한다.
    */
// 이미 입력딘 $customPostType을 add_option으로 넣었다가 다 시덮어쓸필요가 없다.
//    $customPostType = get_option('custom_post_typ');
    $customType = array();
    foreach ($customPostType as $value) {
          array_push($customType, $value["custom_type"]);
    }
    /**
     * @todo   settlement, contact의 metakey 추가 돼야함..
     * custom_post_type과 연관되는 metaKey들.array_key로 key값을 뽑아 사용한다. 
     */
