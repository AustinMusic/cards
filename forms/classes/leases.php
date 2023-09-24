<?php

class leases
{
    public $id;
    public $status;
    public $priority;
    public $AssignedTo;
    public $DueDate;
    public $reportname;
    public $template;
    public $templatepath;
    public $DateCreated;
    public $CreatedBy;
    public $DateModified;
    public $ModifiedBy;
    public $FileOrigin;
    public $clonelink;
    public $photo1;
    public $image;
    public $thumbnail;
    public $property_name;
    public $address;
    public $streetnumber;
    public $streetname;
    public $city;
    public $county;
    public $state;
    public $zip_code;
    public $lat;
    public $lng;
    public $propertytype;
    public $propertysubtype;
    public $park_type;
    public $genmarket;
    public $msa;
    public $submarkid;
    public $traffic_count;
    public $traffic_date;
    public $inter_street;
    public $property_appraised;
    public $appraiser_name;
    public $mc_job;
    public $lessor_name;
    public $new_renewal;
    public $lessee_name;
    public $conf_lessee;
    public $lessee_type;
    public $conf_lessee_name;
    public $lease_start_date;
    public $lease_start_comment;
    public $lease_end_date;
    public $lease_options;
    public $total_lease_term_mos;
    public $lease_option_desc;
    public $mos_vs_mos;
    public $confirm_date;
    public $inspect_type;
    public $inspect_date;
    public $mc_file_no;
    public $confirm_1_source;
    public $relationship_1;
    public $confirm_2_souce;
    public $relationship_2;
    public $market_flyer;
    public $showabsorb1;
    public $showyard;
    public $show_land_bldg;
    public $proj_site;
    public $overall_gba;
    public $overall_nra;
    public $vacancy_sf_nra;
    public $oe_vacany_pct;
    public $inline_space_sf;
    public $inline_vacancy_pct;
    public $gross_land_sf;
    public $gross_land_acre;
    public $land_build_ratio_primary;
    public $parking_stalls;
    public $parking_ratio_gba;
    public $parking_ratio;
    public $year_built;
    public $year_built_search;
    public $last_renovation;
    public $occupancy_type;
    public $no_building;
    public $no_stories;
    public $const_descr;
    public $other_const_features;
    public $building_quality;
    public $int_condition;
    public $ext_condition;
    public $park_quality;
    public $park_cond;
    public $exposure;
    public $site_access;
    public $off_fire_sprinkler;
    public $tenant_area_sf;
    public $office_bo_sf;
    public $floor_number;
    public $flex_off_sf;
    public $veh_showroom_sf;
    public $veh_showroom_pct;
    public $veh_service_sf;
    public $veh_tunnel;
    public $space_generation;
    public $space_position;
    public $office_bo_pct;
    public $load_factor;
    public $load_factor_input;
    public $flex_off_pct_nra;
    public $ind_truck_dock;
    public $ind_truck_grade;
    public $ind_clear_height;
    public $ind_rail;
    public $ind_hvac;
    public $building_class;
    public $off_elevator_service;
    public $off_type_hvac;
    public $shop_anchor_tenant;
    public $rest_no_seats;
    public $rest_drive_thru;
    public $shop_other_tenant;
    public $rest_alcohol;
    public $rest_playground;
    public $veh_level;
    public $veh_dealer_name;
    public $lease_expense_term;
    public $exp_term_adj;
    public $sched_contract_rent;
    public $lease_esc_terms_desc;
    public $init_rent_sf_mo_shell;
    public $init_rent_sf_mo_office;
    public $init_rent_sf_mo_blend;
    public $eff_rent_sf_mo_shell;
    public $eff_rent_sf_mo_office;
    public $eff_rent_sf_mo_blend;
    public $eff_rent_comment_2;
    public $tenant_paid_cam_sf_mo;
    public $init_rent_sf_yr;
    public $init_month_rent;
    public $init_annual_rent;
    public $eff_rent_sf_yr;
    public $eff_month_rent;
    public $eff_annual_rent;
    public $eff_annual_rent_tunnel;
    public $eff_rent_comment_1;
    public $percentage_rent;
    public $tenant_paid_cam_sf_yr;
    public $landlord_paid_exp_sf_yr;
    public $landord_pays;
    public $desc_ti;
    public $concessions_desc;
    public $yard_land_area_sf;
    public $desc_yard_space;
    public $yard_lease_exp_term;
    public $yard_exp_terms_adj;
    public $sched_yard_contracts;
    public $desc_yard_esc_terms;
    public $init_yard_rent_sf_mo;
    public $yard_concession_desc;
    public $eff_yard_rent_sf_mo;
    public $eff_yard_rent_comment;
    public $yard_cam_sf_mo;
    public $yard_lease_comments;
    public $conf_yard_comments;
    public $pre_lease_sf;
    public $pre_lease_pct_nra;
    public $pre_lease_pct_inline;
    public $total_absorb_sf;
    public $total_lease_pct_nra;
    public $total_lease_pct_inline;
    public $start_date;
    public $end_date;
    public $no_mos_absorb;
    public $sf_absorb_mo;
    public $absorb_comment;
    public $zoning_code;
    public $est_land_value_sf;
    public $est_land_value;
    public $rate_return_land;
    public $ind_ann_land_rent;
    public $ind_ann_bldg_rent;
    public $ind_ann_bldg_rent_sf;
	public $mfvalues;    
	public $ssvalues;
    public $lease_comment;
    public $conf_comments;
    public $mf_show_absorbtion;
    public $mf_parking_type;
    public $mf_parking_rent;
    public $mf_application_fee;
    public $mf_movein_fee;
    public $mf_non_refund;
    public $mf_no_unit;
    public $mf_vacant_unit;
    public $mf_pct_vacancy;
    public $mf_no_unit_type;
    public $mf_no_single;
    public $mf_sw_low_rent;
    public $mf_sw_high_rent;
    public $mf_sw_avg_rent;
    public $mf_no_double;
    public $mf_dw_low_rent;
    public $mf_dw_high_rent;
    public $mf_dw_avg_rent;
    public $mf_no_triple;
    public $mf_tw_low_rent;
    public $mf_tw_high_rent;
    public $mf_tw_avg_rent;
    public $mf_no_rv_spaces;
    public $mf_rv_low_rent;
    public $mf_rv_high_rent;
    public $mf_rv_avg_rent;
    public $mf_high_rent;
    public $mf_total_spaces;
    public $mf_total_avg_rent;
    public $mf_avg_rent_comment;
    public $mf_last_increase;
    public $mf_amount;
    public $mf_prelease_unit;
    public $mf_start_date_prelease;
    public $mf_prelease_pct_unit;
    public $mf_end_rent_prelease;
    public $mf_total_unit_absorb;
    public $mf_mos_absorbtion;
    public $mf_total_lease_pct_unit;
    public $mf_unit_absorb_mo;
    public $mf_exercise;
    public $mf_spa;
    public $mf_wd_hookup;
    public $mf_other_amenities;
    public $mf_landlord_rpt;
    public $mf_landlord_insurance;
    public $mf_landlord_cam;
    public $mf_landlord_mgmt_fees;
    public $mf_landlord_water;
    public $mf_landlord_sewer;
    public $mf_landlord_hot_water;
    public $mf_landlord_heat;
    public $mf_landlord_gas;
    public $mf_landlord_trash;
    public $mf_landlord_internet;
    public $mf_landlord_cable;
    public $mf_washdry;
    public $mf_fireplace;
    public $mf_micro;
    public $mf_patio;
    public $mf_dish;
    public $mf_dispo;
    public $mf_vault;
    public $mf_exstor;
    public $mf_club;
    public $mf_playg;
    public $mf_bbq;
    public $mf_bigtv;
    public $mf_sauna;
    public $mf_rvstor;
    public $mf_carport;
    public $mf_shed;
    public $mf_sports;
    public $mf_laund;
    public $mf_pool;
    public $mf_busi;
    public $mf_sec;
    public $ms_no_unit_type;
    public $ms_total_units;
    public $ms_no_vacant_unit;
    public $ms_pct_vacant_unit;
    public $ms_vacancy_comment;
    public $ms_coded_access;
    public $ms_onsite_mgr;
    public $ms_manager_res;
    public $ms_alarm;
    public $ms_heated_unit;
    public $ms_access_hours;
    public $ms_concessions;
    public $docData;
    public $showor;
    public $or_tenant;
    public $ortypes;
    public $desc_or_space;
    public $or_lease_exp_term;
    public $or_exp_terms_adj;
    public $other_rent_sf_mo;
    public $eff_or_comment;
    public $or_concession_desc;
    public $orterms;
    public $or_survey;
    public $sched_or_contracts;
    public $desc_or_esc_terms;
    public $or_comments;
    public $or_conf_source;
    public $or_conf_date;
    public $or_confby;
    public $or_fileno;
	public $confirm1;
	public $confirm2;    
    public $emdomain;
    public $datasource;

    public function getShowor()
    {
        if ( !isset( $this->showor ) ) {
            return 0;
        }
        return $this->showor;
    }

    public function setShowor($showor)
    {
        $this->showor = $showor;
    }

    public function getOr_tenant()
    {
        return $this->or_tenant;
    }

    public function setOr_tenant($or_tenant)
    {
        $this->or_tenant = $or_tenant;
    }

    public function getOrtypes()
    {
        if ( !isset( $this->ortypes ) ) {
            return 0;
        }
        return $this->ortypes;
    }

    public function setOrtypes($ortypes)
    {
        $this->ortypes = $ortypes;
    }

    public function getDesc_or_space()
    {
        return $this->desc_or_space;
    }

    public function setDesc_or_space($desc_or_space)
    {
        $this->desc_or_space = $desc_or_space;
    }

    public function getOr_lease_exp_term()
    {
        if ( !isset( $this->or_lease_exp_term ) ) {
            return 0;
        }
        return $this->or_lease_exp_term;
    }

    public function setOr_lease_exp_term($or_lease_exp_term)
    {
        $this->or_lease_exp_term = $or_lease_exp_term;
    }

    public function getOr_exp_terms_adj()
    {
        if ( !isset( $this->or_exp_terms_adj ) ) {
            return 0;
        }
        return $this->or_exp_terms_adj;
    }

    public function setOr_exp_terms_adj($or_exp_terms_adj)
    {
        $this->or_exp_terms_adj = $or_exp_terms_adj;
    }

    public function getOther_rent_sf_mo()
    {
        if ( !isset( $this->other_rent_sf_mo ) ) {
            return 0;
        }
        return $this->other_rent_sf_mo;
    }

    public function setOther_rent_sf_mo($other_rent_sf_mo)
    {
        $this->other_rent_sf_mo = $other_rent_sf_mo;
    }

    public function getEff_or_comment()
    {
        return $this->eff_or_comment;
    }

    public function setEff_or_comment($eff_or_comment)
    {
        $this->eff_or_comment = $eff_or_comment;
    }

    public function getOr_concession_desc()
    {
        return $this->or_concession_desc;
    }

    public function setOr_concession_desc($or_concession_desc)
    {
        $this->or_concession_desc = $or_concession_desc;
    }

    public function getOrterms()
    {
        return $this->orterms;
    }

    public function setOrterms($orterms)
    {
        $this->orterms = $orterms;
    }

    public function getOr_survey()
    {
        return $this->or_survey;
    }

    public function setOr_survey($or_survey)
    {
        $this->or_survey = $or_survey;
    }

    public function getSched_or_contracts()
    {
        return $this->sched_or_contracts;
    }

    public function setSched_or_contracts($sched_or_contracts)
    {
        $this->sched_or_contracts = $sched_or_contracts;
    }

    public function getDesc_or_esc_terms()
    {
        return $this->desc_or_esc_terms;
    }

    public function setDesc_or_esc_terms($desc_or_esc_terms)
    {
        $this->desc_or_esc_terms = $desc_or_esc_terms;
    }

    public function getOr_comments()
    {
        return $this->or_comments;
    }

    public function setOr_comments($or_comments)
    {
        $this->or_comments = $or_comments;
    }

    public function getOr_conf_source()
    {
        return $this->or_conf_source;
    }

    public function setOr_conf_source($or_conf_source)
    {
        $this->or_conf_source = $or_conf_source;
    }

    public function getOr_conf_date()
    {
        return $this->or_conf_date;
    }

    public function setOr_conf_date($or_conf_date)
    {
        $this->or_conf_date = $or_conf_date;
    }

    public function getOr_confby()
    {
        return $this->or_confby;
    }

    public function setOr_confby($or_confby)
    {
        $this->or_confby = $or_confby;
    }

    public function getOr_fileno()
    {
        return $this->or_fileno;
    }

    public function setOr_fileno($or_fileno)
    {
        $this->or_fileno = $or_fileno;
    }

    public function getDocData() {
        return $this->docData;
    }
    
    public function setDocData( $docData ) {
        $this->docData = $docData;
    }

    public function getId()
    {
        if(!isset($this->id)){
            return 0;
        }
        return intval($this->id);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    public function getAssignedTo()
    {
        return $this->AssignedTo;
    }

    public function setAssignedTo($AssignedTo)
    {
        $this->AssignedTo = $AssignedTo;
    }

    public function getDueDate()
    {
        return $this->DueDate;
    }

    public function setDueDate($DueDate)
    {
        $this->DueDate = $DueDate;
    }

    public function getReportname()
    {
        return $this->reportname;
    }

    public function setReportname($reportname)
    {
        $this->reportname = $reportname;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getTemplatepath()
    {
        return $this->templatepath;
    }

    public function setTemplatepath($templatepath)
    {
        $this->templatepath = $templatepath;
    }

    public function getDateCreated()
    {
        return $this->DateCreated;
    }

    public function setDateCreated($DateCreated)
    {
        $this->DateCreated = $DateCreated;
    }

    public function getCreatedBy()
    {
        return $this->CreatedBy;
    }

    public function setCreatedBy($CreatedBy)
    {
        $this->CreatedBy = $CreatedBy;
    }

    public function getDateModified()
    {
        return $this->DateModified;
    }

    public function setDateModified($DateModified)
    {
        $this->DateModified = $DateModified;
    }

    public function getModifiedBy()
    {
        return $this->ModifiedBy;
    }

    public function setModifiedBy($ModifiedBy)
    {
        $this->ModifiedBy = $ModifiedBy;
    }

    public function getFileOrigin()
    {
        return $this->FileOrigin;
    }

    public function setFileOrigin($FileOrigin)
    {
        $this->FileOrigin = $FileOrigin;
    }

    public function getClonelink()
    {
        return $this->clonelink;
    }

    public function setClonelink($clonelink)
    {
        $this->clonelink = $clonelink;
    }

    public function getPhoto1()
    {
        return $this->photo1;
    }

    public function setPhoto1($photo1)
    {
        $this->photo1 = $photo1;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    public function getProperty_name()
    {
        return $this->property_name;
    }

    public function setProperty_name($property_name)
    {
        $this->property_name = $property_name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getStreetnumber()
    {
        return $this->streetnumber;
    }

    public function setStreetnumber($streetnumber)
    {
        $this->streetnumber = $streetnumber;
    }

    public function getStreetname()
    {
        return $this->streetname;
    }

    public function setStreetname($streetname)
    {
        $this->streetname = $streetname;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCounty()
    {
        return $this->county;
    }

    public function setCounty($county)
    {
        $this->county = $county;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getZip_code()
    {
        return $this->zip_code;
    }

    public function setZip_code($zip_code)
    {
        $this->zip_code = $zip_code;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    public function getPropertytype()
   {
        if(!isset($this->propertytype)){
            return 20;
        }
        return intval($this->propertytype);
    }

    public function setPropertytype($propertytype)
    {
        $this->propertytype = $propertytype;
    }

    public function getPropertysubtype()
    {
        if(!isset($this->propertysubtype)){
            return 1;
        }
        return intval($this->propertysubtype);
    }

    public function setPropertysubtype($propertysubtype)
    {
        $this->propertysubtype = $propertysubtype;
    }

    public function getPark_type()
    {
        return $this->park_type;
    }

    public function setPark_type($park_type)
    {
        $this->park_type = $park_type;
    }

    public function getGenmarket()
    {
        return $this->genmarket;
    }

    public function setGenmarket($genmarket)
    {
        $this->genmarket = $genmarket;
    }

    public function getMsa()
    {
        return $this->msa;
    }

    public function setMsa($msa)
    {
        $this->msa = $msa;
    }

    public function getSubmarkid()
    {
        return $this->submarkid;
    }

    public function setSubmarkid($submarkid)
    {
        $this->submarkid = $submarkid;
    }

    public function getTraffic_count()
    {
        return $this->traffic_count;
    }

    public function setTraffic_count($traffic_count)
    {
        $this->traffic_count = $traffic_count;
    }

    public function getTraffic_date()
    {
        return $this->traffic_date;
    }

    public function setTraffic_date($traffic_date)
    {
        $this->traffic_date = $traffic_date;
    }

    public function getInter_street()
    {
        return $this->inter_street;
    }

    public function setInter_street($inter_street)
    {
        $this->inter_street = $inter_street;
    }

    public function getProperty_appraised()
    {
        if(!isset($this->property_appraised)){
            return 0;
        }
        return $this->property_appraised;
    }

    public function setProperty_appraised($property_appraised)
    {
        $this->property_appraised = $property_appraised;
    }

    public function getAppraiser_name()
    {
        return $this->appraiser_name;
    }

    public function setAppraiser_name($appraiser_name)
    {
        $this->appraiser_name = $appraiser_name;
    }

    public function getMc_job()
    {
        return $this->mc_job;
    }

    public function setMc_job($mc_job)
    {
        $this->mc_job = $mc_job;
    }

    public function getLessor_name()
    {
        return $this->lessor_name;
    }

    public function setLessor_name($lessor_name)
    {
        $this->lessor_name = $lessor_name;
    }

    public function getNew_renewal()
    {
        return $this->new_renewal;
    }

    public function setNew_renewal($new_renewal)
    {
        $this->new_renewal = $new_renewal;
    }

    public function getLessee_name()
    {
        return $this->lessee_name;
    }

    public function setLessee_name($lessee_name)
    {
        $this->lessee_name = $lessee_name;
    }

    public function getConf_lessee()
    {
        if(!isset($this->conf_lessee)){
            return 0;
        }
        return $this->conf_lessee;
    }

    public function setConf_lessee($conf_lessee)
    {
        $this->conf_lessee = $conf_lessee;
    }

    public function getLessee_type()
    {
        return $this->lessee_type;
    }

    public function setLessee_type($lessee_type)
    {
        $this->lessee_type = $lessee_type;
    }

    public function getConf_lessee_name()
    {
        return $this->conf_lessee_name;
    }

    public function setConf_lessee_name($conf_lessee_name)
    {
        $this->conf_lessee_name = $conf_lessee_name;
    }

    public function getLease_start_date()
    {
        return $this->lease_start_date;
    }

    public function setLease_start_date($lease_start_date)
    {
        $this->lease_start_date = $lease_start_date;
    }

    public function getLease_start_comment()
    {
        return $this->lease_start_comment;
    }

    public function setLease_start_comment($lease_start_comment)
    {
        $this->lease_start_comment = $lease_start_comment;
    }

    public function getLease_end_date()
    {
        return $this->lease_end_date;
    }

    public function setLease_end_date($lease_end_date)
    {
        $this->lease_end_date = $lease_end_date;
    }

    public function getLease_options()
    {
        return $this->lease_options;
    }

    public function setLease_options($lease_options)
    {
        $this->lease_options = $lease_options;
    }

    public function getTotal_lease_term_mos()
    {
        return $this->total_lease_term_mos;
    }

    public function setTotal_lease_term_mos($total_lease_term_mos)
    {
        $this->total_lease_term_mos = $total_lease_term_mos;
    }

    public function getLease_option_desc()
    {
        return $this->lease_option_desc;
    }

    public function setLease_option_desc($lease_option_desc)
    {
        $this->lease_option_desc = $lease_option_desc;
    }

    public function getMos_vs_mos()
    {
        return $this->mos_vs_mos;
    }

    public function setMos_vs_mos($mos_vs_mos)
    {
        $this->mos_vs_mos = $mos_vs_mos;
    }

    public function getConfirm_date()
    {
        return $this->confirm_date;
    }

    public function setConfirm_date($confirm_date)
    {
        $this->confirm_date = $confirm_date;
    }

    public function getInspect_type()
    {
        return $this->inspect_type;
    }

    public function setInspect_type($inspect_type)
    {
        $this->inspect_type = $inspect_type;
    }

    public function getInspect_date()
    {
        return $this->inspect_date;
    }

    public function setInspect_date($inspect_date)
    {
        $this->inspect_date = $inspect_date;
    }

    public function getMc_file_no()
    {
        return $this->mc_file_no;
    }

    public function setMc_file_no($mc_file_no)
    {
        $this->mc_file_no = $mc_file_no;
    }

    public function getConfirm_1_source()
    {
        return $this->confirm_1_source;
    }

    public function setConfirm_1_source($confirm_1_source)
    {
        $this->confirm_1_source = $confirm_1_source;
    }

    public function getRelationship_1()
    {
        return $this->relationship_1;
    }

    public function setRelationship_1($relationship_1)
    {
        $this->relationship_1 = $relationship_1;
    }

    public function getConfirm_2_souce()
    {
        return $this->confirm_2_souce;
    }

    public function setConfirm_2_souce($confirm_2_souce)
    {
        $this->confirm_2_souce = $confirm_2_souce;
    }

    public function getRelationship_2()
    {
        return $this->relationship_2;
    }

    public function setRelationship_2($relationship_2)
    {
        $this->relationship_2 = $relationship_2;
    }

    public function getMarket_flyer()
    {
        return $this->market_flyer;
    }

    public function setMarket_flyer($market_flyer)
    {
        $this->market_flyer = $market_flyer;
    }

    public function getShowabsorb1()
    {
        if(!isset($this->showabsorb1)){
            return 0;
        }
        return $this->showabsorb1;
    }

    public function setShowabsorb1($showabsorb1)
    {
        $this->showabsorb1 = $showabsorb1;
    }

    public function getShowyard()
    {
        if(!isset($this->showyard)){
            return 0;
        }
        return $this->showyard;
    }

    public function setShowyard($showyard)
    {
        $this->showyard = $showyard;
    }

    public function getShow_land_bldg()
    {
        if(!isset($this->show_land_bldg)){
            return 0;
        }
        return $this->show_land_bldg;
    }

    public function setShow_land_bldg($show_land_bldg)
    {
        $this->show_land_bldg = $show_land_bldg;
    }

    public function getProj_site()
    {
        if(!isset($this->proj_site)){
            return 0;
        }
        return $this->proj_site;
    }

    public function setProj_site($proj_site)
    {
        $this->proj_site = $proj_site;
    }

    public function getOverall_gba()
    {
        return $this->overall_gba;
    }

    public function setOverall_gba($overall_gba)
    {
        $this->overall_gba = $overall_gba;
    }

    public function getOverall_nra()
    {
        return $this->overall_nra;
    }

    public function setOverall_nra($overall_nra)
    {
        $this->overall_nra = $overall_nra;
    }

    public function getVacancy_sf_nra()
    {
        return $this->vacancy_sf_nra;
    }

    public function setVacancy_sf_nra($vacancy_sf_nra)
    {
        $this->vacancy_sf_nra = $vacancy_sf_nra;
    }

    public function getOe_vacany_pct()
    {
        return $this->oe_vacany_pct;
    }

    public function setOe_vacany_pct($oe_vacany_pct)
    {
        $this->oe_vacany_pct = $oe_vacany_pct;
    }

    public function getInline_space_sf()
    {
        return $this->inline_space_sf;
    }

    public function setInline_space_sf($inline_space_sf)
    {
        $this->inline_space_sf = $inline_space_sf;
    }

    public function getInline_vacancy_pct()
    {
        return $this->inline_vacancy_pct;
    }

    public function setInline_vacancy_pct($inline_vacancy_pct)
    {
        $this->inline_vacancy_pct = $inline_vacancy_pct;
    }

    public function getGross_land_sf()
    {
        return $this->gross_land_sf;
    }

    public function setGross_land_sf($gross_land_sf)
    {
        $this->gross_land_sf = $gross_land_sf;
    }

    public function getGross_land_acre()
    {
        return $this->gross_land_acre;
    }

    public function setGross_land_acre($gross_land_acre)
    {
        $this->gross_land_acre = $gross_land_acre;
    }

    public function getLand_build_ratio_primary()
    {
        return $this->land_build_ratio_primary;
    }

    public function setLand_build_ratio_primary($land_build_ratio_primary)
    {
        $this->land_build_ratio_primary = $land_build_ratio_primary;
    }

    public function getParking_stalls()
    {
        return $this->parking_stalls;
    }

    public function setParking_stalls($parking_stalls)
    {
        $this->parking_stalls = $parking_stalls;
    }

    public function getParking_ratio_gba()
    {
        return $this->parking_ratio_gba;
    }

    public function setParking_ratio_gba($parking_ratio_gba)
    {
        $this->parking_ratio_gba = $parking_ratio_gba;
    }

    public function getParking_ratio()
    {
        return $this->parking_ratio;
    }

    public function setParking_ratio($parking_ratio)
    {
        $this->parking_ratio = $parking_ratio;
    }

    public function getYear_built()
    {
        return $this->year_built;
    }

    public function setYear_built($year_built)
    {
        $this->year_built = $year_built;
    }

    public function getYear_built_search()
    {
        return $this->year_built_search;
    }

    public function setYear_built_search($year_built_search)
    {
        $this->year_built_search = $year_built_search;
    }

    public function getLast_renovation()
    {
        return $this->last_renovation;
    }

    public function setLast_renovation($last_renovation)
    {
        $this->last_renovation = $last_renovation;
    }

    public function getOccupancy_type()
    {
        return $this->occupancy_type;
    }

    public function setOccupancy_type($occupancy_type)
    {
        $this->occupancy_type = $occupancy_type;
    }

    public function getNo_building()
    {
        return $this->no_building;
    }

    public function setNo_building($no_building)
    {
        $this->no_building = $no_building;
    }

    public function getNo_stories()
    {
        return $this->no_stories;
    }

    public function setNo_stories($no_stories)
    {
        $this->no_stories = $no_stories;
    }

    public function getConst_descr()
    {
        return $this->const_descr;
    }

    public function setConst_descr($const_descr)
    {
        $this->const_descr = $const_descr;
    }

    public function getOther_const_features()
    {
        return $this->other_const_features;
    }

    public function setOther_const_features($other_const_features)
    {
        $this->other_const_features = $other_const_features;
    }

    public function getBuilding_quality()
    {
        return $this->building_quality;
    }

    public function setBuilding_quality($building_quality)
    {
        $this->building_quality = $building_quality;
    }

    public function getInt_condition()
    {
        return $this->int_condition;
    }

    public function setInt_condition($int_condition)
    {
        $this->int_condition = $int_condition;
    }

    public function getExt_condition()
    {
        return $this->ext_condition;
    }

    public function setExt_condition($ext_condition)
    {
        $this->ext_condition = $ext_condition;
    }

    public function getPark_quality()
    {
        return $this->park_quality;
    }

    public function setPark_quality($park_quality)
    {
        $this->park_quality = $park_quality;
    }

    public function getPark_cond()
    {
        return $this->park_cond;
    }

    public function setPark_cond($park_cond)
    {
        $this->park_cond = $park_cond;
    }

    public function getExposure()
    {
        return $this->exposure;
    }

    public function setExposure($exposure)
    {
        $this->exposure = $exposure;
    }

    public function getSite_access()
    {
        return $this->site_access;
    }

    public function setSite_access($site_access)
    {
        $this->site_access = $site_access;
    }

    public function getOff_fire_sprinkler()
    {
        return $this->off_fire_sprinkler;
    }

    public function setOff_fire_sprinkler($off_fire_sprinkler)
    {
        $this->off_fire_sprinkler = $off_fire_sprinkler;
    }

    public function getTenant_area_sf()
    {
        return $this->tenant_area_sf;
    }

    public function setTenant_area_sf($tenant_area_sf)
    {
        $this->tenant_area_sf = $tenant_area_sf;
    }

    public function getOffice_bo_sf()
    {
        return $this->office_bo_sf;
    }

    public function setOffice_bo_sf($office_bo_sf)
    {
        $this->office_bo_sf = $office_bo_sf;
    }

    public function getFloor_number()
    {
        return $this->floor_number;
    }

    public function setFloor_number($floor_number)
    {
        $this->floor_number = $floor_number;
    }

    public function getFlex_off_sf()
    {
        return $this->flex_off_sf;
    }

    public function setFlex_off_sf($flex_off_sf)
    {
        $this->flex_off_sf = $flex_off_sf;
    }

    public function getVeh_showroom_sf()
    {
        return $this->veh_showroom_sf;
    }

    public function setVeh_showroom_sf($veh_showroom_sf)
    {
        $this->veh_showroom_sf = $veh_showroom_sf;
    }

    public function getVeh_showroom_pct()
    {
        return $this->veh_showroom_pct;
    }

    public function setVeh_showroom_pct($veh_showroom_pct)
    {
        $this->veh_showroom_pct = $veh_showroom_pct;
    }

    public function getVeh_service_sf()
    {
        return $this->veh_service_sf;
    }

    public function setVeh_service_sf($veh_service_sf)
    {
        $this->veh_service_sf = $veh_service_sf;
    }

    public function getVeh_tunnel()
    {
        return $this->veh_tunnel;
    }

    public function setVeh_tunnel($veh_tunnel)
    {
        $this->veh_tunnel = $veh_tunnel;
    }

    public function getSpace_generation()
    {
        return $this->space_generation;
    }

    public function setSpace_generation($space_generation)
    {
        $this->space_generation = $space_generation;
    }

    public function getSpace_position()
    {
        return $this->space_position;
    }

    public function setSpace_position($space_position)
    {
        $this->space_position = $space_position;
    }

    public function getOffice_bo_pct()
    {
        return $this->office_bo_pct;
    }

    public function setOffice_bo_pct($office_bo_pct)
    {
        $this->office_bo_pct = $office_bo_pct;
    }

    public function getLoad_factor()
    {
        return $this->load_factor;
    }

    public function setLoad_factor($load_factor)
    {
        $this->load_factor = $load_factor;
    }

    public function getLoad_factor_input()
    {
        return $this->load_factor_input;
    }

    public function setLoad_factor_input($load_factor_input)
    {
        $this->load_factor_input = $load_factor_input;
    }

    public function getFlex_off_pct_nra()
    {
        return $this->flex_off_pct_nra;
    }

    public function setFlex_off_pct_nra($flex_off_pct_nra)
    {
        $this->flex_off_pct_nra = $flex_off_pct_nra;
    }

    public function getInd_truck_dock()
    {
        return $this->ind_truck_dock;
    }

    public function setInd_truck_dock($ind_truck_dock)
    {
        $this->ind_truck_dock = $ind_truck_dock;
    }

    public function getInd_truck_grade()
    {
        return $this->ind_truck_grade;
    }

    public function setInd_truck_grade($ind_truck_grade)
    {
        $this->ind_truck_grade = $ind_truck_grade;
    }

    public function getInd_clear_height()
    {
        return $this->ind_clear_height;
    }

    public function setInd_clear_height($ind_clear_height)
    {
        $this->ind_clear_height = $ind_clear_height;
    }

    public function getInd_rail()
    {
        return $this->ind_rail;
    }

    public function setInd_rail($ind_rail)
    {
        $this->ind_rail = $ind_rail;
    }

    public function getInd_hvac()
    {
        return $this->ind_hvac;
    }

    public function setInd_hvac($ind_hvac)
    {
        $this->ind_hvac = $ind_hvac;
    }

    public function getBuilding_class()
    {
        return $this->building_class;
    }

    public function setBuilding_class($building_class)
    {
        $this->building_class = $building_class;
    }

    public function getOff_elevator_service()
    {
        return $this->off_elevator_service;
    }

    public function setOff_elevator_service($off_elevator_service)
    {
        $this->off_elevator_service = $off_elevator_service;
    }

    public function getOff_type_hvac()
    {
        return $this->off_type_hvac;
    }

    public function setOff_type_hvac($off_type_hvac)
    {
        $this->off_type_hvac = $off_type_hvac;
    }

    public function getShop_anchor_tenant()
    {
        return $this->shop_anchor_tenant;
    }

    public function setShop_anchor_tenant($shop_anchor_tenant)
    {
        $this->shop_anchor_tenant = $shop_anchor_tenant;
    }

    public function getRest_no_seats()
    {
        return $this->rest_no_seats;
    }

    public function setRest_no_seats($rest_no_seats)
    {
        $this->rest_no_seats = $rest_no_seats;
    }

    public function getRest_drive_thru()
    {
        return $this->rest_drive_thru;
    }

    public function setRest_drive_thru($rest_drive_thru)
    {
        $this->rest_drive_thru = $rest_drive_thru;
    }

    public function getShop_other_tenant()
    {
        return $this->shop_other_tenant;
    }

    public function setShop_other_tenant($shop_other_tenant)
    {
        $this->shop_other_tenant = $shop_other_tenant;
    }

    public function getRest_alcohol()
    {
        return $this->rest_alcohol;
    }

    public function setRest_alcohol($rest_alcohol)
    {
        $this->rest_alcohol = $rest_alcohol;
    }

    public function getRest_playground()
    {
        return $this->rest_playground;
    }

    public function setRest_playground($rest_playground)
    {
        $this->rest_playground = $rest_playground;
    }

    public function getVeh_level()
    {
        return $this->veh_level;
    }

    public function setVeh_level($veh_level)
    {
        $this->veh_level = $veh_level;
    }

    public function getVeh_dealer_name()
    {
        return $this->veh_dealer_name;
    }

    public function setVeh_dealer_name($veh_dealer_name)
    {
        $this->veh_dealer_name = $veh_dealer_name;
    }

    public function getLease_expense_term()
    {
        return $this->lease_expense_term;
    }

    public function setLease_expense_term($lease_expense_term)
    {
        $this->lease_expense_term = $lease_expense_term;
    }

    public function getExp_term_adj()
    {
        return $this->exp_term_adj;
    }

    public function setExp_term_adj($exp_term_adj)
    {
        $this->exp_term_adj = $exp_term_adj;
    }

    public function getSched_contract_rent()
    {
        return $this->sched_contract_rent;
    }

    public function setSched_contract_rent($sched_contract_rent)
    {
        $this->sched_contract_rent = $sched_contract_rent;
    }

    public function getLease_esc_terms_desc()
    {
        return $this->lease_esc_terms_desc;
    }

    public function setLease_esc_terms_desc($lease_esc_terms_desc)
    {
        $this->lease_esc_terms_desc = $lease_esc_terms_desc;
    }

    public function getInit_rent_sf_mo_shell()
    {
        return $this->init_rent_sf_mo_shell;
    }

    public function setInit_rent_sf_mo_shell($init_rent_sf_mo_shell)
    {
        $this->init_rent_sf_mo_shell = $init_rent_sf_mo_shell;
    }

    public function getInit_rent_sf_mo_office()
    {
        return $this->init_rent_sf_mo_office;
    }

    public function setInit_rent_sf_mo_office($init_rent_sf_mo_office)
    {
        $this->init_rent_sf_mo_office = $init_rent_sf_mo_office;
    }

    public function getInit_rent_sf_mo_blend()
    {
        return $this->init_rent_sf_mo_blend;
    }

    public function setInit_rent_sf_mo_blend($init_rent_sf_mo_blend)
    {
        $this->init_rent_sf_mo_blend = $init_rent_sf_mo_blend;
    }

    public function getEff_rent_sf_mo_shell()
    {
        return $this->eff_rent_sf_mo_shell;
    }

    public function setEff_rent_sf_mo_shell($eff_rent_sf_mo_shell)
    {
        $this->eff_rent_sf_mo_shell = $eff_rent_sf_mo_shell;
    }

    public function getEff_rent_sf_mo_office()
    {
        return $this->eff_rent_sf_mo_office;
    }

    public function setEff_rent_sf_mo_office($eff_rent_sf_mo_office)
    {
        $this->eff_rent_sf_mo_office = $eff_rent_sf_mo_office;
    }

    public function getEff_rent_sf_mo_blend()
    {
        return $this->eff_rent_sf_mo_blend;
    }

    public function setEff_rent_sf_mo_blend($eff_rent_sf_mo_blend)
    {
        $this->eff_rent_sf_mo_blend = $eff_rent_sf_mo_blend;
    }

    public function getEff_rent_comment_2()
    {
        return $this->eff_rent_comment_2;
    }

    public function setEff_rent_comment_2($eff_rent_comment_2)
    {
        $this->eff_rent_comment_2 = $eff_rent_comment_2;
    }

    public function getTenant_paid_cam_sf_mo()
    {
        return $this->tenant_paid_cam_sf_mo;
    }

    public function setTenant_paid_cam_sf_mo($tenant_paid_cam_sf_mo)
    {
        $this->tenant_paid_cam_sf_mo = $tenant_paid_cam_sf_mo;
    }

    public function getInit_rent_sf_yr()
    {
        return $this->init_rent_sf_yr;
    }

    public function setInit_rent_sf_yr($init_rent_sf_yr)
    {
        $this->init_rent_sf_yr = $init_rent_sf_yr;
    }

    public function getInit_month_rent()
    {
        return $this->init_month_rent;
    }

    public function setInit_month_rent($init_month_rent)
    {
        $this->init_month_rent = $init_month_rent;
    }

    public function getInit_annual_rent()
    {
        return $this->init_annual_rent;
    }

    public function setInit_annual_rent($init_annual_rent)
    {
        $this->init_annual_rent = $init_annual_rent;
    }

    public function getEff_rent_sf_yr()
    {
        return $this->eff_rent_sf_yr;
    }

    public function setEff_rent_sf_yr($eff_rent_sf_yr)
    {
        $this->eff_rent_sf_yr = $eff_rent_sf_yr;
    }

    public function getEff_month_rent()
    {
        return $this->eff_month_rent;
    }

    public function setEff_month_rent($eff_month_rent)
    {
        $this->eff_month_rent = $eff_month_rent;
    }

    public function getEff_annual_rent()
    {
        return $this->eff_annual_rent;
    }

    public function setEff_annual_rent($eff_annual_rent)
    {
        $this->eff_annual_rent = $eff_annual_rent;
    }

    public function getEff_annual_rent_tunnel()
    {
        return $this->eff_annual_rent_tunnel;
    }

    public function setEff_annual_rent_tunnel($eff_annual_rent_tunnel)
    {
        $this->eff_annual_rent_tunnel = $eff_annual_rent_tunnel;
    }

    public function getEff_rent_comment_1()
    {
        return $this->eff_rent_comment_1;
    }

    public function setEff_rent_comment_1($eff_rent_comment_1)
    {
        $this->eff_rent_comment_1 = $eff_rent_comment_1;
    }

    public function getPercentage_rent()
    {
        return $this->percentage_rent;
    }

    public function setPercentage_rent($percentage_rent)
    {
        $this->percentage_rent = $percentage_rent;
    }

    public function getTenant_paid_cam_sf_yr()
    {
        return $this->tenant_paid_cam_sf_yr;
    }

    public function setTenant_paid_cam_sf_yr($tenant_paid_cam_sf_yr)
    {
        $this->tenant_paid_cam_sf_yr = $tenant_paid_cam_sf_yr;
    }

    public function getLandlord_paid_exp_sf_yr()
    {
        return $this->landlord_paid_exp_sf_yr;
    }

    public function setLandlord_paid_exp_sf_yr($landlord_paid_exp_sf_yr)
    {
        $this->landlord_paid_exp_sf_yr = $landlord_paid_exp_sf_yr;
    }

    public function getLandord_pays()
    {
        return $this->landord_pays;
    }

    public function setLandord_pays($landord_pays)
    {
        $this->landord_pays = $landord_pays;
    }

    public function getDesc_ti()
    {
        return $this->desc_ti;
    }

    public function setDesc_ti($desc_ti)
    {
        $this->desc_ti = $desc_ti;
    }

    public function getConcessions_desc()
    {
        return $this->concessions_desc;
    }

    public function setConcessions_desc($concessions_desc)
    {
        $this->concessions_desc = $concessions_desc;
    }

    public function getYard_land_area_sf()
    {
        return $this->yard_land_area_sf;
    }

    public function setYard_land_area_sf($yard_land_area_sf)
    {
        $this->yard_land_area_sf = $yard_land_area_sf;
    }

    public function getDesc_yard_space()
    {
        return $this->desc_yard_space;
    }

    public function setDesc_yard_space($desc_yard_space)
    {
        $this->desc_yard_space = $desc_yard_space;
    }

    public function getYard_lease_exp_term()
    {
        return $this->yard_lease_exp_term;
    }

    public function setYard_lease_exp_term($yard_lease_exp_term)
    {
        $this->yard_lease_exp_term = $yard_lease_exp_term;
    }

    public function getYard_exp_terms_adj()
    {
        return $this->yard_exp_terms_adj;
    }

    public function setYard_exp_terms_adj($yard_exp_terms_adj)
    {
        $this->yard_exp_terms_adj = $yard_exp_terms_adj;
    }

    public function getSched_yard_contracts()
    {
        return $this->sched_yard_contracts;
    }

    public function setSched_yard_contracts($sched_yard_contracts)
    {
        $this->sched_yard_contracts = $sched_yard_contracts;
    }

    public function getDesc_yard_esc_terms()
    {
        return $this->desc_yard_esc_terms;
    }

    public function setDesc_yard_esc_terms($desc_yard_esc_terms)
    {
        $this->desc_yard_esc_terms = $desc_yard_esc_terms;
    }

    public function getInit_yard_rent_sf_mo()
    {
        return $this->init_yard_rent_sf_mo;
    }

    public function setInit_yard_rent_sf_mo($init_yard_rent_sf_mo)
    {
        $this->init_yard_rent_sf_mo = $init_yard_rent_sf_mo;
    }

    public function getYard_concession_desc()
    {
        return $this->yard_concession_desc;
    }

    public function setYard_concession_desc($yard_concession_desc)
    {
        $this->yard_concession_desc = $yard_concession_desc;
    }

    public function getEff_yard_rent_sf_mo()
    {
        return $this->eff_yard_rent_sf_mo;
    }

    public function setEff_yard_rent_sf_mo($eff_yard_rent_sf_mo)
    {
        $this->eff_yard_rent_sf_mo = $eff_yard_rent_sf_mo;
    }

    public function getEff_yard_rent_comment()
    {
        return $this->eff_yard_rent_comment;
    }

    public function setEff_yard_rent_comment($eff_yard_rent_comment)
    {
        $this->eff_yard_rent_comment = $eff_yard_rent_comment;
    }

    public function getYard_cam_sf_mo()
    {
        return $this->yard_cam_sf_mo;
    }

    public function setYard_cam_sf_mo($yard_cam_sf_mo)
    {
        $this->yard_cam_sf_mo = $yard_cam_sf_mo;
    }

    public function getYard_lease_comments()
    {
        return $this->yard_lease_comments;
    }

    public function setYard_lease_comments($yard_lease_comments)
    {
        $this->yard_lease_comments = $yard_lease_comments;
    }

    public function getConf_yard_comments()
    {
        return $this->conf_yard_comments;
    }

    public function setConf_yard_comments($conf_yard_comments)
    {
        $this->conf_yard_comments = $conf_yard_comments;
    }

    public function getPre_lease_sf()
    {
        return $this->pre_lease_sf;
    }

    public function setPre_lease_sf($pre_lease_sf)
    {
        $this->pre_lease_sf = $pre_lease_sf;
    }

    public function getPre_lease_pct_nra()
    {
        return $this->pre_lease_pct_nra;
    }

    public function setPre_lease_pct_nra($pre_lease_pct_nra)
    {
        $this->pre_lease_pct_nra = $pre_lease_pct_nra;
    }

    public function getPre_lease_pct_inline()
    {
        return $this->pre_lease_pct_inline;
    }

    public function setPre_lease_pct_inline($pre_lease_pct_inline)
    {
        $this->pre_lease_pct_inline = $pre_lease_pct_inline;
    }

    public function getTotal_absorb_sf()
    {
        return $this->total_absorb_sf;
    }

    public function setTotal_absorb_sf($total_absorb_sf)
    {
        $this->total_absorb_sf = $total_absorb_sf;
    }

    public function getTotal_lease_pct_nra()
    {
        return $this->total_lease_pct_nra;
    }

    public function setTotal_lease_pct_nra($total_lease_pct_nra)
    {
        $this->total_lease_pct_nra = $total_lease_pct_nra;
    }

    public function getTotal_lease_pct_inline()
    {
        return $this->total_lease_pct_inline;
    }

    public function setTotal_lease_pct_inline($total_lease_pct_inline)
    {
        $this->total_lease_pct_inline = $total_lease_pct_inline;
    }

    public function getStart_date()
    {
        return $this->start_date;
    }

    public function setStart_date($start_date)
    {
        $this->start_date = $start_date;
    }

    public function getEnd_date()
    {
        return $this->end_date;
    }

    public function setEnd_date($end_date)
    {
        $this->end_date = $end_date;
    }

    public function getNo_mos_absorb()
    {
        return $this->no_mos_absorb;
    }

    public function setNo_mos_absorb($no_mos_absorb)
    {
        $this->no_mos_absorb = $no_mos_absorb;
    }

    public function getSf_absorb_mo()
    {
        return $this->sf_absorb_mo;
    }

    public function setSf_absorb_mo($sf_absorb_mo)
    {
        $this->sf_absorb_mo = $sf_absorb_mo;
    }

    public function getAbsorb_comment()
    {
        return $this->absorb_comment;
    }

    public function setAbsorb_comment($absorb_comment)
    {
        $this->absorb_comment = $absorb_comment;
    }

    public function getZoning_code()
    {
        return $this->zoning_code;
    }

    public function setZoning_code($zoning_code)
    {
        $this->zoning_code = $zoning_code;
    }

    public function getEst_land_value_sf()
    {
        return $this->est_land_value_sf;
    }

    public function setEst_land_value_sf($est_land_value_sf)
    {
        $this->est_land_value_sf = $est_land_value_sf;
    }

    public function getEst_land_value()
    {
        return $this->est_land_value;
    }

    public function setEst_land_value($est_land_value)
    {
        $this->est_land_value = $est_land_value;
    }

    public function getRate_return_land()
    {
        return $this->rate_return_land;
    }

    public function setRate_return_land($rate_return_land)
    {
        $this->rate_return_land = $rate_return_land;
    }

    public function getInd_ann_land_rent()
    {
        return $this->ind_ann_land_rent;
    }

    public function setInd_ann_land_rent($ind_ann_land_rent)
    {
        $this->ind_ann_land_rent = $ind_ann_land_rent;
    }

    public function getInd_ann_bldg_rent()
    {
        return $this->ind_ann_bldg_rent;
    }

    public function setInd_ann_bldg_rent($ind_ann_bldg_rent)
    {
        $this->ind_ann_bldg_rent = $ind_ann_bldg_rent;
    }

    public function getInd_ann_bldg_rent_sf()
    {
        return $this->ind_ann_bldg_rent_sf;
    }

    public function setInd_ann_bldg_rent_sf($ind_ann_bldg_rent_sf)
    {
        $this->ind_ann_bldg_rent_sf = $ind_ann_bldg_rent_sf;
    }
    
	public function getMfvalues()
    {
        if(!isset($this->mfvalues)){
            return array();
        }
        return $this->mfvalues;
    }
    
    public function setMfvalues($mfvalues)
    {
        $this->mfvalues = $mfvalues;
    }
    
	public function getSsvalues()
    {
        if(!isset($this->ssvalues)){
            return array();
        }
        return $this->ssvalues;
    }
    
    public function setSsvalues($ssvalues)
    {
        $this->ssvalues = $ssvalues;
    }

    public function getLease_comment()
    {
        return $this->lease_comment;
    }

    public function setLease_comment($lease_comment)
    {
        $this->lease_comment = $lease_comment;
    }

    public function getConf_comments()
    {
        return $this->conf_comments;
    }

    public function setConf_comments($conf_comments)
    {
        $this->conf_comments = $conf_comments;
    }

    public function getMf_show_absorbtion()
    {
		if(!isset($this->mf_show_absorbtion)){
			return 0;
		}
        return intval($this->mf_show_absorbtion);
    }

    public function setMf_show_absorbtion($mf_show_absorbtion)
    {
        $this->mf_show_absorbtion = $mf_show_absorbtion;
    }

    public function getMf_parking_type()
    {
        return $this->mf_parking_type;
    }

    public function setMf_parking_type($mf_parking_type)
    {
        $this->mf_parking_type = $mf_parking_type;
    }

    public function getMf_parking_rent()
    {
        return $this->mf_parking_rent;
    }

    public function setMf_parking_rent($mf_parking_rent)
    {
        $this->mf_parking_rent = $mf_parking_rent;
    }

    public function getMf_application_fee()
    {
        return $this->mf_application_fee;
    }

    public function setMf_application_fee($mf_application_fee)
    {
        $this->mf_application_fee = $mf_application_fee;
    }

    public function getMf_movein_fee()
    {
        return $this->mf_movein_fee;
    }

    public function setMf_movein_fee($mf_movein_fee)
    {
        $this->mf_movein_fee = $mf_movein_fee;
    }

    public function getMf_non_refund()
    {
        return $this->mf_non_refund;
    }

    public function setMf_non_refund($mf_non_refund)
    {
        $this->mf_non_refund = $mf_non_refund;
    }

    public function getMf_no_unit()
    {
        return $this->mf_no_unit;
    }

    public function setMf_no_unit($mf_no_unit)
    {
        $this->mf_no_unit = $mf_no_unit;
    }

    public function getMf_vacant_unit()
    {
        return $this->mf_vacant_unit;
    }

    public function setMf_vacant_unit($mf_vacant_unit)
    {
        $this->mf_vacant_unit = $mf_vacant_unit;
    }

    public function getMf_pct_vacancy()
    {
        return $this->mf_pct_vacancy;
    }

    public function setMf_pct_vacancy($mf_pct_vacancy)
    {
        $this->mf_pct_vacancy = $mf_pct_vacancy;
    }

    public function getMf_no_unit_type()
    {
        return $this->mf_no_unit_type;
    }

    public function setMf_no_unit_type($mf_no_unit_type)
    {
        $this->mf_no_unit_type = $mf_no_unit_type;
    }

    public function getMf_no_single()
    {
        return $this->mf_no_single;
    }

    public function setMf_no_single($mf_no_single)
    {
        $this->mf_no_single = $mf_no_single;
    }

    public function getMf_sw_low_rent()
    {
        return $this->mf_sw_low_rent;
    }

    public function setMf_sw_low_rent($mf_sw_low_rent)
    {
        $this->mf_sw_low_rent = $mf_sw_low_rent;
    }

    public function getMf_sw_high_rent()
    {
        return $this->mf_sw_high_rent;
    }

    public function setMf_sw_high_rent($mf_sw_high_rent)
    {
        $this->mf_sw_high_rent = $mf_sw_high_rent;
    }

    public function getMf_sw_avg_rent()
    {
        return $this->mf_sw_avg_rent;
    }

    public function setMf_sw_avg_rent($mf_sw_avg_rent)
    {
        $this->mf_sw_avg_rent = $mf_sw_avg_rent;
    }

    public function getMf_no_double()
    {
        return $this->mf_no_double;
    }

    public function setMf_no_double($mf_no_double)
    {
        $this->mf_no_double = $mf_no_double;
    }

    public function getMf_dw_low_rent()
    {
        return $this->mf_dw_low_rent;
    }

    public function setMf_dw_low_rent($mf_dw_low_rent)
    {
        $this->mf_dw_low_rent = $mf_dw_low_rent;
    }

    public function getMf_dw_high_rent()
    {
        return $this->mf_dw_high_rent;
    }

    public function setMf_dw_high_rent($mf_dw_high_rent)
    {
        $this->mf_dw_high_rent = $mf_dw_high_rent;
    }

    public function getMf_dw_avg_rent()
    {
        return $this->mf_dw_avg_rent;
    }

    public function setMf_dw_avg_rent($mf_dw_avg_rent)
    {
        $this->mf_dw_avg_rent = $mf_dw_avg_rent;
    }

    public function getMf_no_triple()
    {
        return $this->mf_no_triple;
    }

    public function setMf_no_triple($mf_no_triple)
    {
        $this->mf_no_triple = $mf_no_triple;
    }

    public function getMf_tw_low_rent()
    {
        return $this->mf_tw_low_rent;
    }

    public function setMf_tw_low_rent($mf_tw_low_rent)
    {
        $this->mf_tw_low_rent = $mf_tw_low_rent;
    }

    public function getMf_tw_high_rent()
    {
        return $this->mf_tw_high_rent;
    }

    public function setMf_tw_high_rent($mf_tw_high_rent)
    {
        $this->mf_tw_high_rent = $mf_tw_high_rent;
    }

    public function getMf_tw_avg_rent()
    {
        return $this->mf_tw_avg_rent;
    }

    public function setMf_tw_avg_rent($mf_tw_avg_rent)
    {
        $this->mf_tw_avg_rent = $mf_tw_avg_rent;
    }

    public function getMf_no_rv_spaces()
    {
        return $this->mf_no_rv_spaces;
    }

    public function setMf_no_rv_spaces($mf_no_rv_spaces)
    {
        $this->mf_no_rv_spaces = $mf_no_rv_spaces;
    }

    public function getMf_rv_low_rent()
    {
        return $this->mf_rv_low_rent;
    }

    public function setMf_rv_low_rent($mf_rv_low_rent)
    {
        $this->mf_rv_low_rent = $mf_rv_low_rent;
    }

    public function getMf_rv_high_rent()
    {
        return $this->mf_rv_high_rent;
    }

    public function setMf_rv_high_rent($mf_rv_high_rent)
    {
        $this->mf_rv_high_rent = $mf_rv_high_rent;
    }

    public function getMf_rv_avg_rent()
    {
        return $this->mf_rv_avg_rent;
    }

    public function setMf_rv_avg_rent($mf_rv_avg_rent)
    {
        $this->mf_rv_avg_rent = $mf_rv_avg_rent;
    }

    public function getMf_high_rent()
    {
        return $this->mf_high_rent;
    }

    public function setMf_high_rent($mf_high_rent)
    {
        $this->mf_high_rent = $mf_high_rent;
    }

    public function getMf_total_spaces()
    {
        return $this->mf_total_spaces;
    }

    public function setMf_total_spaces($mf_total_spaces)
    {
        $this->mf_total_spaces = $mf_total_spaces;
    }

    public function getMf_total_avg_rent()
    {
        return $this->mf_total_avg_rent;
    }

    public function setMf_total_avg_rent($mf_total_avg_rent)
    {
        $this->mf_total_avg_rent = $mf_total_avg_rent;
    }

    public function getMf_avg_rent_comment()
    {
        return $this->mf_avg_rent_comment;
    }

    public function setMf_avg_rent_comment($mf_avg_rent_comment)
    {
        $this->mf_avg_rent_comment = $mf_avg_rent_comment;
    }

    public function getMf_last_increase()
    {
        return $this->mf_last_increase;
    }

    public function setMf_last_increase($mf_last_increase)
    {
        $this->mf_last_increase = $mf_last_increase;
    }

    public function getMf_amount()
    {
        return $this->mf_amount;
    }

    public function setMf_amount($mf_amount)
    {
        $this->mf_amount = $mf_amount;
    }

    public function getMf_prelease_unit()
    {
        return $this->mf_prelease_unit;
    }

    public function setMf_prelease_unit($mf_prelease_unit)
    {
        $this->mf_prelease_unit = $mf_prelease_unit;
    }

    public function getMf_start_date_prelease()
    {
        return $this->mf_start_date_prelease;
    }

    public function setMf_start_date_prelease($mf_start_date_prelease)
    {
        $this->mf_start_date_prelease = $mf_start_date_prelease;
    }

    public function getMf_prelease_pct_unit()
    {
        return $this->mf_prelease_pct_unit;
    }

    public function setMf_prelease_pct_unit($mf_prelease_pct_unit)
    {
        $this->mf_prelease_pct_unit = $mf_prelease_pct_unit;
    }

    public function getMf_end_rent_prelease()
    {
        return $this->mf_end_rent_prelease;
    }

    public function setMf_end_rent_prelease($mf_end_rent_prelease)
    {
        $this->mf_end_rent_prelease = $mf_end_rent_prelease;
    }

    public function getMf_total_unit_absorb()
    {
        return $this->mf_total_unit_absorb;
    }

    public function setMf_total_unit_absorb($mf_total_unit_absorb)
    {
        $this->mf_total_unit_absorb = $mf_total_unit_absorb;
    }

    public function getMf_mos_absorbtion()
    {
        return $this->mf_mos_absorbtion;
    }

    public function setMf_mos_absorbtion($mf_mos_absorbtion)
    {
        $this->mf_mos_absorbtion = $mf_mos_absorbtion;
    }

    public function getMf_total_lease_pct_unit()
    {
        return $this->mf_total_lease_pct_unit;
    }

    public function setMf_total_lease_pct_unit($mf_total_lease_pct_unit)
    {
        $this->mf_total_lease_pct_unit = $mf_total_lease_pct_unit;
    }

    public function getMf_unit_absorb_mo()
    {
        return $this->mf_unit_absorb_mo;
    }

    public function setMf_unit_absorb_mo($mf_unit_absorb_mo)
    {
        $this->mf_unit_absorb_mo = $mf_unit_absorb_mo;
    }

    public function getMf_exercise()
    {
        return $this->mf_exercise;
    }

    public function setMf_exercise($mf_exercise)
    {
        $this->mf_exercise = $mf_exercise;
    }

    public function getMf_spa()
    {
        return $this->mf_spa;
    }

    public function setMf_spa($mf_spa)
    {
        $this->mf_spa = $mf_spa;
    }

    public function getMf_wd_hookup()
    {
        return $this->mf_wd_hookup;
    }

    public function setMf_wd_hookup($mf_wd_hookup)
    {
        $this->mf_wd_hookup = $mf_wd_hookup;
    }

    public function getMf_other_amenities()
    {
        return $this->mf_other_amenities;
    }

    public function setMf_other_amenities($mf_other_amenities)
    {
        $this->mf_other_amenities = $mf_other_amenities;
    }

    public function getMf_landlord_rpt()
    {
        return $this->mf_landlord_rpt;
    }

    public function setMf_landlord_rpt($mf_landlord_rpt)
    {
        $this->mf_landlord_rpt = $mf_landlord_rpt;
    }

    public function getMf_landlord_insurance()
    {
        return $this->mf_landlord_insurance;
    }

    public function setMf_landlord_insurance($mf_landlord_insurance)
    {
        $this->mf_landlord_insurance = $mf_landlord_insurance;
    }

    public function getMf_landlord_cam()
    {
        return $this->mf_landlord_cam;
    }

    public function setMf_landlord_cam($mf_landlord_cam)
    {
        $this->mf_landlord_cam = $mf_landlord_cam;
    }

    public function getMf_landlord_mgmt_fees()
    {
        return $this->mf_landlord_mgmt_fees;
    }

    public function setMf_landlord_mgmt_fees($mf_landlord_mgmt_fees)
    {
        $this->mf_landlord_mgmt_fees = $mf_landlord_mgmt_fees;
    }

    public function getMf_landlord_water()
    {
        return $this->mf_landlord_water;
    }

    public function setMf_landlord_water($mf_landlord_water)
    {
        $this->mf_landlord_water = $mf_landlord_water;
    }

    public function getMf_landlord_sewer()
    {
        return $this->mf_landlord_sewer;
    }

    public function setMf_landlord_sewer($mf_landlord_sewer)
    {
        $this->mf_landlord_sewer = $mf_landlord_sewer;
    }

    public function getMf_landlord_hot_water()
    {
        return $this->mf_landlord_hot_water;
    }

    public function setMf_landlord_hot_water($mf_landlord_hot_water)
    {
        $this->mf_landlord_hot_water = $mf_landlord_hot_water;
    }

    public function getMf_landlord_heat()
    {
        return $this->mf_landlord_heat;
    }

    public function setMf_landlord_heat($mf_landlord_heat)
    {
        $this->mf_landlord_heat = $mf_landlord_heat;
    }

    public function getMf_landlord_gas()
    {
        return $this->mf_landlord_gas;
    }

    public function setMf_landlord_gas($mf_landlord_gas)
    {
        $this->mf_landlord_gas = $mf_landlord_gas;
    }

    public function getMf_landlord_trash()
    {
        return $this->mf_landlord_trash;
    }

    public function setMf_landlord_trash($mf_landlord_trash)
    {
        $this->mf_landlord_trash = $mf_landlord_trash;
    }

    public function getMf_landlord_internet()
    {
        return $this->mf_landlord_internet;
    }

    public function setMf_landlord_internet($mf_landlord_internet)
    {
        $this->mf_landlord_internet = $mf_landlord_internet;
    }

    public function getMf_landlord_cable()
    {
        return $this->mf_landlord_cable;
    }

    public function setMf_landlord_cable($mf_landlord_cable)
    {
        $this->mf_landlord_cable = $mf_landlord_cable;
    }

    public function getMf_washdry()
    {
        return $this->mf_washdry;
    }

    public function setMf_washdry($mf_washdry)
    {
        $this->mf_washdry = $mf_washdry;
    }

    public function getMf_fireplace()
    {
        return $this->mf_fireplace;
    }

    public function setMf_fireplace($mf_fireplace)
    {
        $this->mf_fireplace = $mf_fireplace;
    }

    public function getMf_micro()
    {
        return $this->mf_micro;
    }

    public function setMf_micro($mf_micro)
    {
        $this->mf_micro = $mf_micro;
    }

    public function getMf_patio()
    {
        return $this->mf_patio;
    }

    public function setMf_patio($mf_patio)
    {
        $this->mf_patio = $mf_patio;
    }

    public function getMf_dish()
    {
        return $this->mf_dish;
    }

    public function setMf_dish($mf_dish)
    {
        $this->mf_dish = $mf_dish;
    }

    public function getMf_dispo()
    {
        return $this->mf_dispo;
    }

    public function setMf_dispo($mf_dispo)
    {
        $this->mf_dispo = $mf_dispo;
    }

    public function getMf_vault()
    {
        return $this->mf_vault;
    }

    public function setMf_vault($mf_vault)
    {
        $this->mf_vault = $mf_vault;
    }

    public function getMf_exstor()
    {
        return $this->mf_exstor;
    }

    public function setMf_exstor($mf_exstor)
    {
        $this->mf_exstor = $mf_exstor;
    }

    public function getMf_club()
    {
        return $this->mf_club;
    }

    public function setMf_club($mf_club)
    {
        $this->mf_club = $mf_club;
    }

    public function getMf_playg()
    {
        return $this->mf_playg;
    }

    public function setMf_playg($mf_playg)
    {
        $this->mf_playg = $mf_playg;
    }

    public function getMf_bbq()
    {
        return $this->mf_bbq;
    }

    public function setMf_bbq($mf_bbq)
    {
        $this->mf_bbq = $mf_bbq;
    }

    public function getMf_bigtv()
    {
        return $this->mf_bigtv;
    }

    public function setMf_bigtv($mf_bigtv)
    {
        $this->mf_bigtv = $mf_bigtv;
    }

    public function getMf_sauna()
    {
        return $this->mf_sauna;
    }

    public function setMf_sauna($mf_sauna)
    {
        $this->mf_sauna = $mf_sauna;
    }

    public function getMf_rvstor()
    {
        return $this->mf_rvstor;
    }

    public function setMf_rvstor($mf_rvstor)
    {
        $this->mf_rvstor = $mf_rvstor;
    }

    public function getMf_carport()
    {
        return $this->mf_carport;
    }

    public function setMf_carport($mf_carport)
    {
        $this->mf_carport = $mf_carport;
    }

    public function getMf_shed()
    {
        return $this->mf_shed;
    }

    public function setMf_shed($mf_shed)
    {
        $this->mf_shed = $mf_shed;
    }

    public function getMf_sports()
    {
        return $this->mf_sports;
    }

    public function setMf_sports($mf_sports)
    {
        $this->mf_sports = $mf_sports;
    }

    public function getMf_laund()
    {
        return $this->mf_laund;
    }

    public function setMf_laund($mf_laund)
    {
        $this->mf_laund = $mf_laund;
    }

    public function getMf_pool()
    {
        return $this->mf_pool;
    }

    public function setMf_pool($mf_pool)
    {
        $this->mf_pool = $mf_pool;
    }

    public function getMf_busi()
    {
        return $this->mf_busi;
    }

    public function setMf_busi($mf_busi)
    {
        $this->mf_busi = $mf_busi;
    }

    public function getMf_sec()
    {
        return $this->mf_sec;
    }

    public function setMf_sec($mf_sec)
    {
        $this->mf_sec = $mf_sec;
    }

    public function getMs_no_unit_type()
    {
        return $this->ms_no_unit_type;
    }

    public function setMs_no_unit_type($ms_no_unit_type)
    {
        $this->ms_no_unit_type = $ms_no_unit_type;
    }

    public function getMs_total_units()
    {
        return $this->ms_total_units;
    }

    public function setMs_total_units($ms_total_units)
    {
        $this->ms_total_units = $ms_total_units;
    }

    public function getMs_no_vacant_unit()
    {
        return $this->ms_no_vacant_unit;
    }

    public function setMs_no_vacant_unit($ms_no_vacant_unit)
    {
        $this->ms_no_vacant_unit = $ms_no_vacant_unit;
    }

    public function getMs_pct_vacant_unit()
    {
        return $this->ms_pct_vacant_unit;
    }

    public function setMs_pct_vacant_unit($ms_pct_vacant_unit)
    {
        $this->ms_pct_vacant_unit = $ms_pct_vacant_unit;
    }

    public function getMs_vacancy_comment()
    {
        return $this->ms_vacancy_comment;
    }

    public function setMs_vacancy_comment($ms_vacancy_comment)
    {
        $this->ms_vacancy_comment = $ms_vacancy_comment;
    }

    public function getMs_coded_access()
    {
        return $this->ms_coded_access;
    }

    public function setMs_coded_access($ms_coded_access)
    {
        $this->ms_coded_access = $ms_coded_access;
    }

    public function getMs_onsite_mgr()
    {
        return $this->ms_onsite_mgr;
    }

    public function setMs_onsite_mgr($ms_onsite_mgr)
    {
        $this->ms_onsite_mgr = $ms_onsite_mgr;
    }

    public function getMs_manager_res()
    {
        return $this->ms_manager_res;
    }

    public function setMs_manager_res($ms_manager_res)
    {
        $this->ms_manager_res = $ms_manager_res;
    }

    public function getMs_alarm()
    {
        return $this->ms_alarm;
    }

    public function setMs_alarm($ms_alarm)
    {
        $this->ms_alarm = $ms_alarm;
    }

    public function getMs_heated_unit()
    {
        return $this->ms_heated_unit;
    }

    public function setMs_heated_unit($ms_heated_unit)
    {
        $this->ms_heated_unit = $ms_heated_unit;
    }

    public function getMs_access_hours()
    {
        return $this->ms_access_hours;
    }

    public function setMs_access_hours($ms_access_hours)
    {
        $this->ms_access_hours = $ms_access_hours;
    }

    public function getMs_concessions()
    {
        return $this->ms_concessions;
    }

    public function setMs_concessions($ms_concessions)
    {
        $this->ms_concessions = $ms_concessions;
    } 
    
	public function getConfirm1() {
		return $this->confirm1;
	}

	public function setConfirm1( $confirm1 ) {
		$this->confirm1 = $confirm1;
	}  
	
	public function getConfirm2() {
		return $this->confirm2;
	}

	public function setConfirm2( $confirm2 ) {
		$this->confirm2 = $confirm2;
	}   
	    
	public function getEmdomain()
    {
        if(!isset($this->emdomain)){
            return 0;
        }
        return intval($this->emdomain);
    }

	public function setEmdomain( $emdomain ) {
		$this->emdomain = $emdomain;
	}	

    public function getDatasource()
    {
        return $this->datasource;
    }

    public function setDatasource($datasource)
    {
        $this->datasource = $datasource;
    }

    function __construct(){}

    function __destruct(){}
}

?>