<?php

class improvedsales
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
    public $property_name;
    public $address;
    public $streetnumber;
    public $streetname;
    public $city;
    public $state;
    public $zip_code;
    public $county;
    public $propertytype;
    public $legal_desc;
    public $propertysubtype;
    public $genmarket;
    public $submarkid;
    public $msa;
    public $lng;
    public $lat;
    public $photo1;
    public $image;
    public $thumbnail;
    public $platmap;
	public $platimage;
    public $gla_inputtype;
    public $gla_inputsize;
    public $gross_land_sf;
    public $primary_acre;
    public $gross_land_acre;
    public $primary_sf;
    public $unusable_sf;
    public $unusable_acre;
    public $unusable_desc;
    public $surplus_sf;
    public $surplus_acre;
    public $surplus_desc;
    public $excess_sf;
    public $excess_acre;
    public $excess_desc;
    public $net_usable_sf;
    public $shape;
    public $net_usable_acre;
    public $topography;
    public $net_usable_desc;
    public $site_access;
    public $orientation;
    public $exposure;
    public $utilities;
    public $flood_plain;
    public $fppanel;
    public $easement;
    public $easement_desc;
    public $other_land_comments;
    public $traffic_count;
    public $inter_street;
    public $traffic_date;
    public $zoning_code;
    public $zoning_desc;
    public $zoning_juris;
    public $no_building;
    public $no_stories;
    public $floor_1_gba;
    public $floor_2_gba;
    public $total_basement_gba;
    public $basement_pct_gba;
    public $overall_gba;
    public $gba_source;
    public $floor_1_nra;
    public $floor_2_nra;
    public $total_basement_nra;
    public $basement_pct_nra;
    public $overall_nra;
    public $nra_source;
    public $basement_type;
    public $storage_basement_sf;
    public $ancillary_area_sf;
    public $ancillary_area_desc;
    public $land_build_ratio_overall;
    public $land_build_ratio_primary;
    public $land_build_usable;
    public $site_cover_overall;
    public $site_cover_primary;
    public $floor_area_ratio;
    public $year_built_search;
    public $last_renovation;
    public $year_built;
    public $occupancy_type;
    public $building_quality;
    public $int_condition;
    public $ext_condition;
    public $building_class;
    public $const_class;
    public $const_descr;
    public $other_const_features;
    public $parking_stalls;
    public $parking_ratio_gba;
    public $parking_ratio_nra;
    public $parking_type;
    public $parking_ratio;
    public $building_comments;
    public $eff_ratio_pct_nra;
    public $replace_cost;
    public $est_rcn;
    public $less_alloc_imp_price;
    public $depreciation_all_sources;
    public $implied_total_pct_deprec;
    public $eff_age_years;
    public $physical_depreciation;
    public $inplied_func_obsol;
    public $oe_income_actual_proforma;
    public $oe_income_source;
    public $oe_only_noi;
    public $oe_pgr;
    public $oe_cam_income;
    public $oe_misc_income;
    public $oe_pgi;
    public $oe_vacany_pct;
    public $oe_vacancy_credit_loss;
    public $oe_other_income;
    public $oe_egi;
    public $oe_expences;
    public $oe_total_other_income;
    public $oe_pgr_sf_nra;
    public $oe_cam_sf_nra;
    public $pgi_sf_nra;
    public $vacancy_sf_nra;
    public $egi_sf_nra;
    public $expence_sf_nra;
    public $oe_noi_sf_nra;
    public $oe_expence_ratio;
    public $oe_reserves;
    public $oe_management_expence;
    public $oe_total_noi;
    public $prop_rights_conv;
    public $interest_conv;
    public $fin_term_adj_desc;
    public $cond_sale_desc;
    public $defer_maint_cost;
    public $defer_main_cost_desc;
    public $broker_cost;
    public $broker_cost_desc;
    public $eff_sale_price_actual;
    public $desc_ffe;
    public $property_appraised;
    public $appraiser_name;
    public $mc_job;
    public $grantor;
    public $grantee;
    public $sale_price;
    public $record_date;
    public $conv_doc_type;
    public $conv_doc_rec_no;
    public $type_finance;
    public $market_time;
    public $list_price_avail;
    public $list_price;
    public $list_price_change;
    public $current_use;
    public $proposed_use_change;
    public $proposed_use_desc;
    public $stabil_cost;
    public $stabil_cost_desc;
    public $eff_sale_price_stab;
    public $add_ti_cost;
    public $add_ti_cost_desc;
    public $excess_surpluss_sf;
    public $excess_surplus_value_desc;
    public $buyer_status;
    public $sale_status;
    public $value_ffe;
    public $adj_price_comment;
    public $cond_sale_adj;
    public $alloc_land_value_source;
    public $underlying_land_value_primary;
    public $alloc_land_value;
    public $alloc_imp_value;
    public $excess_surplus_value;
    public $fin_term_adj;
    public $cash_equiv_price;
    public $total_value_ffe;
    public $market_flyer;
    public $photo2;
    public $subphoto2;
    public $photo3;
    public $subphoto3;
    public $photo4;
    public $subphoto4;
    public $photo5;
    public $subphoto5;
    public $inc_ffe;
    public $datasource;
    public $confirm_date;
    public $confirm_1_source;
    public $relationship_1;
    public $inspect_date;
    public $inspect_type;
    public $confirm_2_souce;
    public $relationship_2;
    public $mc_file_no;
    public $sale_comments;
    public $cap_rate;
    public $egim;
    public $adj_price_sf_gba;
    public $adj_price_sf_nra;
    public $conf_comments;
    public $alloc_imp_value_sf_gba;
    public $alloc_imp_value_sf_nra;
    public $adj_price_tunnel;
    public $adj_price_unit;
    public $fuel_sales_mult;
    public $store_sales_mult;
    public $pgim;
    public $ind_clear_height;
    public $ind_ext_office_1;
    public $ind_ext_office_2;
    public $ind_fire;
    public $ind_hvac;
    public $ind_int_office_1;
    public $ind_int_office_2;
    public $ind_mezz_desc;
    public $ind_no_rail;
    public $ind_pct_office;
    public $ind_rail;
    public $ind_storage_mess;
    public $ind_storage_mezz_sf;
    public $ind_total_office;
    public $ind_truck_dock;
    public $ind_truck_grade;
    public $off_elevator_service;
    public $off_fire_sprinkler;
    public $off_type_hvac;
    public $rest_alcohol;
    public $rest_drive_thru;
    public $rest_no_seats;
    public $rest_playground;
    public $shop_achor_space_inc;
    public $shop_anchor_pct;
    public $shop_anchor_sf;
    public $shop_anchor_tenant;
    public $shop_inline_pct;
    public $shop_inline_sf;
    public $shop_other_tenant;
    public $shop_total_gba;
    public $shop_total_nra;
    public $ss_alarm;
    public $ss_boat;
    public $ss_code_access;
    public $ss_heat;
    public $ss_on_site;
    public $ss_residence;
    public $ss_residence_desc;
    public $ss_security;
    public $store_avg_month_gallon;
    public $store_canopy;
    public $store_canopy_desc;
    public $store_chain_affil;
    public $store_co_chain_affil;
    public $store_fuel_desc;
    public $store_month_car_wash_sales;
    public $store_month_mini_sales;
    public $store_month_store_sales;
    public $store_no_fuel;
    public $store_total_month_sales;
    public $veh_level;
    public $veh_service_sf;
    public $veh_showroom_pct;
    public $veh_showroom_sf;
    public $veh_tunnel;
    public $wash_dry;
    public $exercise;
    public $spa;
    public $other_amenities;
    public $no_single_wide;
    public $no_triple_wide;
    public $no_double_wide;
    public $no_rv_space;
    public $total_space;
    public $other_building_desc;
    public $park_cond;
    public $park_quality;
    public $space_acre;
    public $price_space;
    public $noi_space;
    public $expense_space;
    public $no_other_building;
    public $pgi_space;
    public $vacancy_space;
    public $egi_space;
    public $total_no_units;
    public $density;
    public $avg_unit_size;
    public $total_bedroom;
    public $bedroom_ratio;
    public $parking_ratio_unit;
    public $subsidized_project;
    public $subsidized_project_desc;
    public $avg_month_rent_unit;
    public $avg_month_rent_sf;
    public $annual_turnover_pct;
    public $total_rooms;
    public $pgi_unit;
    public $expense_unit;
    public $vacancy_unit;
    public $noi_unit;
    public $egi_unit;
    public $total_storage_units;
    public $docData;
	public $mfvalues;
    public $assessedyear;
    public $rmvland;
    public $rmvimp;
    public $rmvtotal;
    public $taxes;
    public $assessedvalues;
	public $confirm1;
	public $confirm2;
    public $emdomain;  
	public $sfbedroom;  
	public $sffullbath;  
	public $sfhalfbath;
	public $addstructures;
	
    
    public function getAssessedvalues() {
    if ( !isset( $this->assessedvalues ) ) {
      return array();
    }
    return $this->assessedvalues;
  }

  public function setAssessedvalues( $assessedvalues ) {
    $this->assessedvalues = $assessedvalues;
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
	
    public function getDocData()
    {
        return $this->docData;
    }

    public function setDocData($docData)
    {
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

    public function getCounty()
    {
        return $this->county;
    }

    public function setCounty($county)
    {
        $this->county = $county;
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

    public function getLegal_desc()
    {
        return $this->legal_desc;
    }

    public function setLegal_desc($legal_desc)
    {
        $this->legal_desc = $legal_desc;
    }

    public function getPropertysubtype()
    {
        return $this->propertysubtype;
    }

    public function setPropertysubtype($propertysubtype)
    {
        $this->propertysubtype = $propertysubtype;
    }

    public function getGenmarket()
    {
        return $this->genmarket;
    }

    public function setGenmarket($genmarket)
    {
        $this->genmarket = $genmarket;
    }

    public function getSubmarkid()
    {
        return $this->submarkid;
    }

    public function setSubmarkid($submarkid)
    {
        $this->submarkid = $submarkid;
    }

    public function getMsa()
    {
        return $this->msa;
    }

    public function setMsa($msa)
    {
        $this->msa = $msa;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat)
    {
        $this->lat = $lat;
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

    public function getPlatmap()
    {
        return $this->platmap;
    }

    public function setPlatmap($platmap)
    {
        $this->platmap = $platmap;
    }
	
	public function getPlatimage()
    {
        return $this->platimage;
    }

    public function setPlatimage($platimage)
    {
        $this->platimage = $platimage;
    }

    public function getGla_inputtype()
    {
        return $this->gla_inputtype;
    }

    public function setGla_inputtype($gla_inputtype)
    {
        $this->gla_inputtype = $gla_inputtype;
    }

    public function getGla_inputsize()
    {
        return $this->gla_inputsize;
    }

    public function setGla_inputsize($gla_inputsize)
    {
        $this->gla_inputsize = $gla_inputsize;
    }

    public function getGross_land_sf()
    {
        if(!isset($this->gross_land_sf)){
            return 0;
        }
        return $this->gross_land_sf;
    }

    public function setGross_land_sf($gross_land_sf)
    {
        $this->gross_land_sf = $gross_land_sf;
    }

    public function getPrimary_acre()
    {
        if(!isset($this->primary_acre)){
            return 0;
        }
        return $this->primary_acre;
    }

    public function setPrimary_acre($primary_acre)
    {
        $this->primary_acre = $primary_acre;
    }

    public function getGross_land_acre()
    {
        if(!isset($this->gross_land_acre)){
            return 0;
        }
        return $this->gross_land_acre;
    }

    public function setGross_land_acre($gross_land_acre)
    {
        $this->gross_land_acre = $gross_land_acre;
    }

    public function getPrimary_sf()
    {
        if(!isset($this->primary_sf)){
            return 0;
        }
        return $this->primary_sf;
    }

    public function setPrimary_sf($primary_sf)
    {
        $this->primary_sf = $primary_sf;
    }

    public function getUnusable_sf()
    {
        return $this->unusable_sf;
    }

    public function setUnusable_sf($unusable_sf)
    {
        $this->unusable_sf = $unusable_sf;
    }

    public function getUnusable_acre()
    {
        if(!isset($this->unusable_acre)){
            return 0;
        }
        return $this->unusable_acre;
    }

    public function setUnusable_acre($unusable_acre)
    {
        $this->unusable_acre = $unusable_acre;
    }

    public function getUnusable_desc()
    {
        return $this->unusable_desc;
    }

    public function setUnusable_desc($unusable_desc)
    {
        $this->unusable_desc = $unusable_desc;
    }

    public function getSurplus_sf()
    {
        return $this->surplus_sf;
    }

    public function setSurplus_sf($surplus_sf)
    {
        $this->surplus_sf = $surplus_sf;
    }

    public function getSurplus_acre()
    {
        if(!isset($this->surplus_acre)){
            return 0;
        }
        return $this->surplus_acre;
    }

    public function setSurplus_acre($surplus_acre)
    {
        $this->surplus_acre = $surplus_acre;
    }

    public function getSurplus_desc()
    {
        return $this->surplus_desc;
    }

    public function setSurplus_desc($surplus_desc)
    {
        $this->surplus_desc = $surplus_desc;
    }

    public function getExcess_sf()
    {
        return $this->excess_sf;
    }

    public function setExcess_sf($excess_sf)
    {
        $this->excess_sf = $excess_sf;
    }

    public function getExcess_acre()
    {
        if(!isset($this->excess_acre)){
            return 0;
        }
        return $this->excess_acre;
    }

    public function setExcess_acre($excess_acre)
    {
        $this->excess_acre = $excess_acre;
    }

    public function getExcess_desc()
    {
        return $this->excess_desc;
    }

    public function setExcess_desc($excess_desc)
    {
        $this->excess_desc = $excess_desc;
    }

    public function getNet_usable_sf()
    {
        if(!isset($this->net_usable_sf)){
            return 0;
        }
        return $this->net_usable_sf;
    }

    public function setNet_usable_sf($net_usable_sf)
    {
        $this->net_usable_sf = $net_usable_sf;
    }

    public function getShape()
    {
        return $this->shape;
    }

    public function setShape($shape)
    {
        $this->shape = $shape;
    }

    public function getNet_usable_acre()
    {
        if(!isset($this->net_usable_acre)){
            return 0;
        }
        return $this->net_usable_acre;
    }

    public function setNet_usable_acre($net_usable_acre)
    {
        $this->net_usable_acre = $net_usable_acre;
    }

    public function getTopography()
    {
        return $this->topography;
    }

    public function setTopography($topography)
    {
        $this->topography = $topography;
    }

    public function getNet_usable_desc()
    {
        return $this->net_usable_desc;
    }

    public function setNet_usable_desc($net_usable_desc)
    {
        $this->net_usable_desc = $net_usable_desc;
    }

    public function getSite_access()
    {
        return $this->site_access;
    }

    public function setSite_access($site_access)
    {
        $this->site_access = $site_access;
    }

    public function getOrientation()
    {
        return $this->orientation;
    }

    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    }

    public function getExposure()
    {
        return $this->exposure;
    }

    public function setExposure($exposure)
    {
        $this->exposure = $exposure;
    }

    public function getUtilities()
    {
        return $this->utilities;
    }

    public function setUtilities($utilities)
    {
        $this->utilities = $utilities;
    }

    public function getFlood_plain()
    {
        return $this->flood_plain;
    }

    public function setFlood_plain($flood_plain)
    {
        $this->flood_plain = $flood_plain;
    }
    public function getFppanel()
    {
        return $this->fppanel;
    }

    public function setFppanel($fppanel)
    {
        $this->fppanel = $fppanel;
    }

    public function getEasement()
    {
        return $this->easement;
    }

    public function setEasement($easement)
    {
        $this->easement = $easement;
    }

    public function getEasement_desc()
    {
        return $this->easement_desc;
    }

    public function setEasement_desc($easement_desc)
    {
        $this->easement_desc = $easement_desc;
    }

    public function getOther_land_comments()
    {
        return $this->other_land_comments;
    }

    public function setOther_land_comments($other_land_comments)
    {
        $this->other_land_comments = $other_land_comments;
    }

    public function getTraffic_count()
    {
        return $this->traffic_count;
    }

    public function setTraffic_count($traffic_count)
    {
        $this->traffic_count = $traffic_count;
    }

    public function getInter_street()
    {
        return $this->inter_street;
    }

    public function setInter_street($inter_street)
    {
        $this->inter_street = $inter_street;
    }

    public function getTraffic_date()
    {
        return $this->traffic_date;
    }

    public function setTraffic_date($traffic_date)
    {
        $this->traffic_date = $traffic_date;
    }

    public function getZoning_code()
    {
        return $this->zoning_code;
    }

    public function setZoning_code($zoning_code)
    {
        $this->zoning_code = $zoning_code;
    }

    public function getZoning_desc()
    {
        return $this->zoning_desc;
    }

    public function setZoning_desc($zoning_desc)
    {
        $this->zoning_desc = $zoning_desc;
    }

    public function getZoning_juris()
    {
        return $this->zoning_juris;
    }

    public function setZoning_juris($zoning_juris)
    {
        $this->zoning_juris = $zoning_juris;
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

    public function getFloor_1_gba()
    {
        if(!isset($this->floor_1_gba)){
            return 0;
        }
        return $this->floor_1_gba;
    }

    public function setFloor_1_gba($floor_1_gba)
    {
        $this->floor_1_gba = $floor_1_gba;
    }

    public function getFloor_2_gba()
    {
        if(!isset($this->floor_2_gba)){
            return 0;
        }
        return $this->floor_2_gba;
    }

    public function setFloor_2_gba($floor_2_gba)
    {
        $this->floor_2_gba = $floor_2_gba;
    }

    public function getTotal_basement_gba()
    {
        if(!isset($this->total_basement_gba)){
            return 0;
        }
        return $this->total_basement_gba;
    }

    public function setTotal_basement_gba($total_basement_gba)
    {
        $this->total_basement_gba = $total_basement_gba;
    }

    public function getBasement_pct_gba()
    {
        if(!isset($this->basement_pct_gba)){
            return 0;
        }
        return $this->basement_pct_gba;
    }

    public function setBasement_pct_gba($basement_pct_gba)
    {
        $this->basement_pct_gba = $basement_pct_gba;
    }

    public function getOverall_gba()
    {
        if(!isset($this->overall_gba)){
            return 0;
        }
        return $this->overall_gba;
    }

    public function setOverall_gba($overall_gba)
    {
        $this->overall_gba = $overall_gba;
    }

    public function getGba_source()
    {
        return $this->gba_source;
    }

    public function setGba_source($gba_source)
    {
        $this->gba_source = $gba_source;
    }

    public function getFloor_1_nra()
    {
        if(!isset($this->floor_1_nra)){
            return 0;
        }
        return $this->floor_1_nra;
    }

    public function setFloor_1_nra($floor_1_nra)
    {
        $this->floor_1_nra = $floor_1_nra;
    }

    public function getFloor_2_nra()
    {
        if(!isset($this->floor_2_nra)){
            return 0;
        }
        return $this->floor_2_nra;
    }

    public function setFloor_2_nra($floor_2_nra)
    {
        $this->floor_2_nra = $floor_2_nra;
    }

    public function getTotal_basement_nra()
    {
        if(!isset($this->total_basement_nra)){
            return 0;
        }
        return $this->total_basement_nra;
    }

    public function setTotal_basement_nra($total_basement_nra)
    {
        $this->total_basement_nra = $total_basement_nra;
    }

    public function getBasement_pct_nra()
    {
        if(!isset($this->basement_pct_nra)){
            return 0;
        }
        return $this->basement_pct_nra;
    }

    public function setBasement_pct_nra($basement_pct_nra)
    {
        $this->basement_pct_nra = $basement_pct_nra;
    }

    public function getOverall_nra()
    {
        if(!isset($this->overall_nra)){
            return 0;
        }
        return $this->overall_nra;
    }

    public function setOverall_nra($overall_nra)
    {
        $this->overall_nra = $overall_nra;
    }

    public function getNra_source()
    {
        return $this->nra_source;
    }

    public function setNra_source($nra_source)
    {
        $this->nra_source = $nra_source;
    }

    public function getBasement_type()
    {
        return $this->basement_type;
    }

    public function setBasement_type($basement_type)
    {
        $this->basement_type = $basement_type;
    }

    public function getStorage_basement_sf()
    {
        if(!isset($this->storage_basement_sf)){
            return 0;
        }
        return $this->storage_basement_sf;
    }

    public function setStorage_basement_sf($storage_basement_sf)
    {
        $this->storage_basement_sf = $storage_basement_sf;
    }

    public function getAncillary_area_sf()
    {
        if(!isset($this->ancillary_area_sf)){
            return 0;
        }
        return $this->ancillary_area_sf;
    }

    public function setAncillary_area_sf($ancillary_area_sf)
    {
        $this->ancillary_area_sf = $ancillary_area_sf;
    }

    public function getAncillary_area_desc()
    {
        return $this->ancillary_area_desc;
    }

    public function setAncillary_area_desc($ancillary_area_desc)
    {
        $this->ancillary_area_desc = $ancillary_area_desc;
    }

    public function getLand_build_ratio_overall()
    {
        if(!isset($this->land_build_ratio_overall)){
            return 0;
        }
        return $this->land_build_ratio_overall;
    }

    public function setLand_build_ratio_overall($land_build_ratio_overall)
    {
        $this->land_build_ratio_overall = $land_build_ratio_overall;
    }

    public function getLand_build_ratio_primary()
    {
        if(!isset($this->land_build_ratio_primary)){
            return 0;
        }
        return $this->land_build_ratio_primary;
    }

    public function setLand_build_ratio_primary($land_build_ratio_primary)
    {
        $this->land_build_ratio_primary = $land_build_ratio_primary;
    }

    public function getLand_build_usable()
    {
        if(!isset($this->land_build_usable)){
            return 0;
        }
        return $this->land_build_usable;
    }

    public function setLand_build_usable($land_build_usable)
    {
        $this->land_build_usable = $land_build_usable;
    }

    public function getSite_cover_overall()
    {
        if(!isset($this->site_cover_overall)){
            return 0;
        }
        return $this->site_cover_overall;
    }

    public function setSite_cover_overall($site_cover_overall)
    {
        $this->site_cover_overall = $site_cover_overall;
    }

    public function getSite_cover_primary()
    {
        if(!isset($this->site_cover_primary)){
            return 0;
        }
        return $this->site_cover_primary;
    }

    public function setSite_cover_primary($site_cover_primary)
    {
        $this->site_cover_primary = $site_cover_primary;
    }

    public function getFloor_area_ratio()
    {
        if(!isset($this->floor_area_ratio)){
            return 0;
        }
        return $this->floor_area_ratio;
    }

    public function setFloor_area_ratio($floor_area_ratio)
    {
        $this->floor_area_ratio = $floor_area_ratio;
    }

    public function getYear_built_search()
    {
        if(!isset($this->year_built_search)){
            return 0;
        }
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

    public function getYear_built()
    {
        return $this->year_built;
    }

    public function setYear_built($year_built)
    {
        $this->year_built = $year_built;
    }

    public function getOccupancy_type()
    {
        return $this->occupancy_type;
    }

    public function setOccupancy_type($occupancy_type)
    {
        $this->occupancy_type = $occupancy_type;
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

    public function getBuilding_class()
    {
        return $this->building_class;
    }

    public function setBuilding_class($building_class)
    {
        $this->building_class = $building_class;
    }

    public function getConst_class()
    {
        return $this->const_class;
    }

    public function setConst_class($const_class)
    {
        $this->const_class = $const_class;
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

    public function getParking_stalls()
    {
        if(!isset($this->parking_stalls)){
            return 0;
        }
        return $this->parking_stalls;
    }

    public function setParking_stalls($parking_stalls)
    {
        $this->parking_stalls = $parking_stalls;
    }

    public function getParking_ratio_gba()
    {
        if(!isset($this->parking_ratio_gba)){
            return 0;
        }
        return $this->parking_ratio_gba;
    }

    public function setParking_ratio_gba($parking_ratio_gba)
    {
        $this->parking_ratio_gba = $parking_ratio_gba;
    }

    public function getParking_ratio_nra()
    {
        if(!isset($this->parking_ratio_nra)){
            return 0;
        }
        return $this->parking_ratio_nra;
    }

    public function setParking_ratio_nra($parking_ratio_nra)
    {
        $this->parking_ratio_nra = $parking_ratio_nra;
    }

    public function getParking_type()
    {
        return $this->parking_type;
    }

    public function setParking_type($parking_type)
    {
        $this->parking_type = $parking_type;
    }

    public function getParking_ratio()
    {
        return $this->parking_ratio;
    }

    public function setParking_ratio($parking_ratio)
    {
        $this->parking_ratio = $parking_ratio;
    }

    public function getBuilding_comments()
    {
        return $this->building_comments;
    }

    public function setBuilding_comments($building_comments)
    {
        $this->building_comments = $building_comments;
    }

    public function getEff_ratio_pct_nra()
    {
        if(!isset($this->eff_ratio_pct_nra)){
            return 0;
        }
        return $this->eff_ratio_pct_nra;
    }

    public function setEff_ratio_pct_nra($eff_ratio_pct_nra)
    {
        $this->eff_ratio_pct_nra = $eff_ratio_pct_nra;
    }

    public function getReplace_cost()
    {
        return $this->replace_cost;
    }

    public function setReplace_cost($replace_cost)
    {
        $this->replace_cost = $replace_cost;
    }

    public function getEst_rcn()
    {
        return $this->est_rcn;
    }

    public function setEst_rcn($est_rcn)
    {
        $this->est_rcn = $est_rcn;
    }

    public function getLess_alloc_imp_price()
    {
        return $this->less_alloc_imp_price;
    }

    public function setLess_alloc_imp_price($less_alloc_imp_price)
    {
        $this->less_alloc_imp_price = $less_alloc_imp_price;
    }

    public function getDepreciation_all_sources()
    {
        return $this->depreciation_all_sources;
    }

    public function setDepreciation_all_sources($depreciation_all_sources)
    {
        $this->depreciation_all_sources = $depreciation_all_sources;
    }

    public function getImplied_total_pct_deprec()
    {
        return $this->implied_total_pct_deprec;
    }

    public function setImplied_total_pct_deprec($implied_total_pct_deprec)
    {
        $this->implied_total_pct_deprec = $implied_total_pct_deprec;
    }

    public function getEff_age_years()
    {
        if(!isset($this->eff_age_years)){
            return 0;
        }
        return $this->eff_age_years;
    }

    public function setEff_age_years($eff_age_years)
    {
        $this->eff_age_years = $eff_age_years;
    }

    public function getPhysical_depreciation()
    {
        return $this->physical_depreciation;
    }

    public function setPhysical_depreciation($physical_depreciation)
    {
        $this->physical_depreciation = $physical_depreciation;
    }

    public function getInplied_func_obsol()
    {
        return $this->inplied_func_obsol;
    }

    public function setInplied_func_obsol($inplied_func_obsol)
    {
        $this->inplied_func_obsol = $inplied_func_obsol;
    }

    public function getOe_income_actual_proforma()
    {
        return $this->oe_income_actual_proforma;
    }

    public function setOe_income_actual_proforma($oe_income_actual_proforma)
    {
        $this->oe_income_actual_proforma = $oe_income_actual_proforma;
    }

    public function getOe_income_source()
    {
        return $this->oe_income_source;
    }

    public function setOe_income_source($oe_income_source)
    {
        $this->oe_income_source = $oe_income_source;
    }

    public function getOe_only_noi()
    {
        if(!isset($this->oe_only_noi)){
            return 0;
        }
        return intval($this->oe_only_noi);
    }

    public function setOe_only_noi($oe_only_noi)
    {
        $this->oe_only_noi = $oe_only_noi;
    }

    public function getOe_pgr()
    {
        if(!isset($this->oe_pgr)){
            return 0;
        }
        return $this->oe_pgr;
    }

    public function setOe_pgr($oe_pgr)
    {
        $this->oe_pgr = $oe_pgr;
    }

    public function getOe_cam_income()
    {
        if(!isset($this->oe_cam_income)){
            return 0;
        }
        return $this->oe_cam_income;
    }

    public function setOe_cam_income($oe_cam_income)
    {
        $this->oe_cam_income = $oe_cam_income;
    }

    public function getOe_misc_income()
    {
        if(!isset($this->oe_misc_income)){
            return 0;
        }
        return $this->oe_misc_income;
    }

    public function setOe_misc_income($oe_misc_income)
    {
        $this->oe_misc_income = $oe_misc_income;
    }

    public function getOe_pgi()
    {
        if(!isset($this->oe_pgi)){
            return 0;
        }
        return $this->oe_pgi;
    }

    public function setOe_pgi($oe_pgi)
    {
        $this->oe_pgi = $oe_pgi;
    }

    public function getOe_vacany_pct()
    {
        if(!isset($this->oe_vacany_pct)){
            return 0;
        }
        return $this->oe_vacany_pct;
    }

    public function setOe_vacany_pct($oe_vacany_pct)
    {
        $this->oe_vacany_pct = $oe_vacany_pct;
    }

    public function getOe_vacancy_credit_loss()
    {
        if(!isset($this->oe_vacancy_credit_loss)){
            return 0;
        }
        return $this->oe_vacancy_credit_loss;
    }

    public function setOe_vacancy_credit_loss($oe_vacancy_credit_loss)
    {
        $this->oe_vacancy_credit_loss = $oe_vacancy_credit_loss;
    }

    public function getOe_other_income()
    {
        return $this->oe_other_income;
    }

    public function setOe_other_income($oe_other_income)
    {
        $this->oe_other_income = $oe_other_income;
    }

    public function getOe_egi()
    {
        if(!isset($this->oe_egi)){
            return 0;
        }
        return $this->oe_egi;
    }

    public function setOe_egi($oe_egi)
    {
        $this->oe_egi = $oe_egi;
    }

    public function getOe_expences()
    {
        if(!isset($this->oe_expences)){
            return 0;
        }
        return $this->oe_expences;
    }

    public function setOe_expences($oe_expences)
    {
        $this->oe_expences = $oe_expences;
    }

    public function getOe_total_other_income()
    {
        if(!isset($this->oe_total_other_income)){
            return 0;
        }
        return $this->oe_total_other_income;
    }

    public function setOe_total_other_income($oe_total_other_income)
    {
        $this->oe_total_other_income = $oe_total_other_income;
    }

    public function getOe_pgr_sf_nra()
    {
        if(!isset($this->oe_pgr_sf_nra)){
            return 0;
        }
        return $this->oe_pgr_sf_nra;
    }

    public function setOe_pgr_sf_nra($oe_pgr_sf_nra)
    {
        $this->oe_pgr_sf_nra = $oe_pgr_sf_nra;
    }

    public function getOe_cam_sf_nra()
    {
        if(!isset($this->oe_cam_sf_nra)){
            return 0;
        }
        return $this->oe_cam_sf_nra;
    }

    public function setOe_cam_sf_nra($oe_cam_sf_nra)
    {
        $this->oe_cam_sf_nra = $oe_cam_sf_nra;
    }

    public function getPgi_sf_nra()
    {
        if(!isset($this->pgi_sf_nra)){
            return 0;
        }
        return $this->pgi_sf_nra;
    }

    public function setPgi_sf_nra($pgi_sf_nra)
    {
        $this->pgi_sf_nra = $pgi_sf_nra;
    }

    public function getVacancy_sf_nra()
    {
        if(!isset($this->vacancy_sf_nra)){
            return 0;
        }
        return $this->vacancy_sf_nra;
    }

    public function setVacancy_sf_nra($vacancy_sf_nra)
    {
        $this->vacancy_sf_nra = $vacancy_sf_nra;
    }

    public function getEgi_sf_nra()
    {
        if(!isset($this->egi_sf_nra)){
            return 0;
        }
        return $this->egi_sf_nra;
    }

    public function setEgi_sf_nra($egi_sf_nra)
    {
        $this->egi_sf_nra = $egi_sf_nra;
    }

    public function getExpence_sf_nra()
    {
        if(!isset($this->expence_sf_nra)){
            return 0;
        }
        return $this->expence_sf_nra;
    }

    public function setExpence_sf_nra($expence_sf_nra)
    {
        $this->expence_sf_nra = $expence_sf_nra;
    }

    public function getOe_noi_sf_nra()
    {
        if(!isset($this->oe_noi_sf_nra)){
            return 0;
        }
        return $this->oe_noi_sf_nra;
    }

    public function setOe_noi_sf_nra($oe_noi_sf_nra)
    {
        $this->oe_noi_sf_nra = $oe_noi_sf_nra;
    }

    public function getOe_expence_ratio()
    {
        if(!isset($this->oe_expence_ratio)){
            return 0;
        }
        return $this->oe_expence_ratio;
    }

    public function setOe_expence_ratio($oe_expence_ratio)
    {
        $this->oe_expence_ratio = $oe_expence_ratio;
    }

    public function getOe_reserves()
    {
        return $this->oe_reserves;
    }

    public function setOe_reserves($oe_reserves)
    {
        $this->oe_reserves = $oe_reserves;
    }

    public function getOe_management_expence()
    {
        return $this->oe_management_expence;
    }

    public function setOe_management_expence($oe_management_expence)
    {
        $this->oe_management_expence = $oe_management_expence;
    }

    public function getOe_total_noi()
    {
        if(!isset($this->oe_total_noi)){
            return 0;
        }
        return $this->oe_total_noi;
    }

    public function setOe_total_noi($oe_total_noi)
    {
        $this->oe_total_noi = $oe_total_noi;
    }

    public function getProp_rights_conv()
    {
        return $this->prop_rights_conv;
    }

    public function setProp_rights_conv($prop_rights_conv)
    {
        $this->prop_rights_conv = $prop_rights_conv;
    }

    public function getInterest_conv()
    {
        return $this->interest_conv;
    }

    public function setInterest_conv($interest_conv)
    {
        $this->interest_conv = $interest_conv;
    }

    public function getFin_term_adj_desc()
    {
        return $this->fin_term_adj_desc;
    }

    public function setFin_term_adj_desc($fin_term_adj_desc)
    {
        $this->fin_term_adj_desc = $fin_term_adj_desc;
    }

    public function getCond_sale_desc()
    {
        return $this->cond_sale_desc;
    }

    public function setCond_sale_desc($cond_sale_desc)
    {
        $this->cond_sale_desc = $cond_sale_desc;
    }

    public function getDefer_maint_cost()
    {
        return $this->defer_maint_cost;
    }

    public function setDefer_maint_cost($defer_maint_cost)
    {
        $this->defer_maint_cost = $defer_maint_cost;
    }

    public function getDefer_main_cost_desc()
    {
        return $this->defer_main_cost_desc;
    }

    public function setDefer_main_cost_desc($defer_main_cost_desc)
    {
        $this->defer_main_cost_desc = $defer_main_cost_desc;
    }

    public function getBroker_cost()
    {
        return $this->broker_cost;
    }

    public function setBroker_cost($broker_cost)
    {
        $this->broker_cost = $broker_cost;
    }

    public function getBroker_cost_desc()
    {
        return $this->broker_cost_desc;
    }

    public function setBroker_cost_desc($broker_cost_desc)
    {
        $this->broker_cost_desc = $broker_cost_desc;
    }

    public function getEff_sale_price_actual()
    {
        if(!isset($this->eff_sale_price_actual)){
            return 0;
        }
        return $this->eff_sale_price_actual;
    }

    public function setEff_sale_price_actual($eff_sale_price_actual)
    {
        $this->eff_sale_price_actual = $eff_sale_price_actual;
    }

    public function getDesc_ffe()
    {
        return $this->desc_ffe;
    }

    public function setDesc_ffe($desc_ffe)
    {
        $this->desc_ffe = $desc_ffe;
    }

    public function getProperty_appraised()
    {
        if(!isset($this->property_appraised)){
            return 0;
        }
        return intval($this->property_appraised);
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

    public function getGrantor()
    {
        return $this->grantor;
    }

    public function setGrantor($grantor)
    {
        $this->grantor = $grantor;
    }

    public function getGrantee()
    {
        return $this->grantee;
    }

    public function setGrantee($grantee)
    {
        $this->grantee = $grantee;
    }

    public function getSale_price()
    {
        return $this->sale_price;
    }

    public function setSale_price($sale_price)
    {
        $this->sale_price = $sale_price;
    }

    public function getRecord_date()
    {
        return $this->record_date;
    }

    public function setRecord_date($record_date)
    {
        $this->record_date = $record_date;
    }

    public function getConv_doc_type()
    {
        return $this->conv_doc_type;
    }

    public function setConv_doc_type($conv_doc_type)
    {
        $this->conv_doc_type = $conv_doc_type;
    }

    public function getConv_doc_rec_no()
    {
        return $this->conv_doc_rec_no;
    }

    public function setConv_doc_rec_no($conv_doc_rec_no)
    {
        $this->conv_doc_rec_no = $conv_doc_rec_no;
    }

    public function getType_finance()
    {
        return $this->type_finance;
    }

    public function setType_finance($type_finance)
    {
        $this->type_finance = $type_finance;
    }

    public function getMarket_time()
    {
        return $this->market_time;
    }

    public function setMarket_time($market_time)
    {
        $this->market_time = $market_time;
    }

    public function getList_price_avail()
    {
        if(!isset($this->list_price_avail)){
            return 0;
        }
        return intval($this->list_price_avail);
    }

    public function setList_price_avail($list_price_avail)
    {
        $this->list_price_avail = $list_price_avail;
    }

    public function getList_price()
    {
        return $this->list_price;
    }

    public function setList_price($list_price)
    {
        $this->list_price = $list_price;
    }

    public function getList_price_change()
    {
        return $this->list_price_change;
    }

    public function setList_price_change($list_price_change)
    {
        $this->list_price_change = $list_price_change;
    }

    public function getCurrent_use()
    {
        return $this->current_use;
    }

    public function setCurrent_use($current_use)
    {
        $this->current_use = $current_use;
    }

    public function getProposed_use_change()
    {
        return $this->proposed_use_change;
    }

    public function setProposed_use_change($proposed_use_change)
    {
        $this->proposed_use_change = $proposed_use_change;
    }

    public function getProposed_use_desc()
    {
        return $this->proposed_use_desc;
    }

    public function setProposed_use_desc($proposed_use_desc)
    {
        $this->proposed_use_desc = $proposed_use_desc;
    }

    public function getStabil_cost()
    {
        return $this->stabil_cost;
    }

    public function setStabil_cost($stabil_cost)
    {
        $this->stabil_cost = $stabil_cost;
    }

    public function getStabil_cost_desc()
    {
        return $this->stabil_cost_desc;
    }

    public function setStabil_cost_desc($stabil_cost_desc)
    {
        $this->stabil_cost_desc = $stabil_cost_desc;
    }

    public function getEff_sale_price_stab()
    {
        if(!isset($this->eff_sale_price_stab)){
            return 0;
        }
        return $this->eff_sale_price_stab;
    }

    public function setEff_sale_price_stab($eff_sale_price_stab)
    {
        $this->eff_sale_price_stab = $eff_sale_price_stab;
    }

    public function getAdd_ti_cost()
    {
        return $this->add_ti_cost;
    }

    public function setAdd_ti_cost($add_ti_cost)
    {
        $this->add_ti_cost = $add_ti_cost;
    }

    public function getAdd_ti_cost_desc()
    {
        return $this->add_ti_cost_desc;
    }

    public function setAdd_ti_cost_desc($add_ti_cost_desc)
    {
        $this->add_ti_cost_desc = $add_ti_cost_desc;
    }

    public function getExcess_surpluss_sf()
    {
        if(!isset($this->excess_surpluss_sf)){
            return 0;
        }
        return $this->excess_surpluss_sf;
    }

    public function setExcess_surpluss_sf($excess_surpluss_sf)
    {
        $this->excess_surpluss_sf = $excess_surpluss_sf;
    }

    public function getExcess_surplus_value_desc()
    {
        return $this->excess_surplus_value_desc;
    }

    public function setExcess_surplus_value_desc($excess_surplus_value_desc)
    {
        $this->excess_surplus_value_desc = $excess_surplus_value_desc;
    }

    public function getBuyer_status()
    {
        return $this->buyer_status;
    }

    public function setBuyer_status($buyer_status)
    {
        $this->buyer_status = $buyer_status;
    }

    public function getSale_status()
    {
        return $this->sale_status;
    }

    public function setSale_status($sale_status)
    {
        $this->sale_status = $sale_status;
    }

    public function getValue_ffe()
    {
        return $this->value_ffe;
    }

    public function setValue_ffe($value_ffe)
    {
        $this->value_ffe = $value_ffe;
    }

    public function getAdj_price_comment()
    {
        return $this->adj_price_comment;
    }

    public function setAdj_price_comment($adj_price_comment)
    {
        $this->adj_price_comment = $adj_price_comment;
    }

    public function getCond_sale_adj()
    {
        return $this->cond_sale_adj;
    }

    public function setCond_sale_adj($cond_sale_adj)
    {
        $this->cond_sale_adj = $cond_sale_adj;
    }

    public function getAlloc_land_value_source()
    {
        return $this->alloc_land_value_source;
    }

    public function setAlloc_land_value_source($alloc_land_value_source)
    {
        $this->alloc_land_value_source = $alloc_land_value_source;
    }

    public function getUnderlying_land_value_primary()
    {
        return $this->underlying_land_value_primary;
    }

    public function setUnderlying_land_value_primary($underlying_land_value_primary)
    {
        $this->underlying_land_value_primary = $underlying_land_value_primary;
    }

    public function getAlloc_land_value()
    {
        if(!isset($this->alloc_land_value)){
            return 0;
        }
        return $this->alloc_land_value;
    }

    public function setAlloc_land_value($alloc_land_value)
    {
        $this->alloc_land_value = $alloc_land_value;
    }

    public function getAlloc_imp_value()
    {
        if(!isset($this->alloc_imp_value)){
            return 0;
        }
        return $this->alloc_imp_value;
    }

    public function setAlloc_imp_value($alloc_imp_value)
    {
        $this->alloc_imp_value = $alloc_imp_value;
    }

    public function getExcess_surplus_value()
    {
        return $this->excess_surplus_value;
    }

    public function setExcess_surplus_value($excess_surplus_value)
    {
        $this->excess_surplus_value = $excess_surplus_value;
    }

    public function getFin_term_adj()
    {
        return $this->fin_term_adj;
    }

    public function setFin_term_adj($fin_term_adj)
    {
        $this->fin_term_adj = $fin_term_adj;
    }

    public function getCash_equiv_price()
    {
        if(!isset($this->cash_equiv_price)){
            return 0;
        }
        return $this->cash_equiv_price;
    }

    public function setCash_equiv_price($cash_equiv_price)
    {
        $this->cash_equiv_price = $cash_equiv_price;
    }

    public function getTotal_value_ffe()
    {
        if(!isset($this->total_value_ffe)){
            return 0;
        }
        return $this->total_value_ffe;
    }

    public function setTotal_value_ffe($total_value_ffe)
    {
        $this->total_value_ffe = $total_value_ffe;
    }

    public function getMarket_flyer()
    {
        return $this->market_flyer;
    }

    public function setMarket_flyer($market_flyer)
    {
        $this->market_flyer = $market_flyer;
    }

    public function getPhoto2()
    {
        return $this->photo2;
    }

    public function setPhoto2($photo2)
    {
        $this->photo2 = $photo2;
    }

    public function getSubphoto2()
    {
        return $this->subphoto2;
    }

    public function setSubphoto2($subphoto2)
    {
        $this->subphoto2 = $subphoto2;
    }

    public function getPhoto3()
    {
        return $this->photo3;
    }

    public function setPhoto3($photo3)
    {
        $this->photo3 = $photo3;
    }

    public function getSubphoto3()
    {
        return $this->subphoto3;
    }

    public function setSubphoto3($subphoto3)
    {
        $this->subphoto3 = $subphoto3;
    }

    public function getPhoto4()
    {
        return $this->photo4;
    }

    public function setPhoto4($photo4)
    {
        $this->photo4 = $photo4;
    }

    public function getSubphoto4()
    {
        return $this->subphoto4;
    }

    public function setSubphoto4($subphoto4)
    {
        $this->subphoto4 = $subphoto4;
    }

    public function getPhoto5()
    {
        return $this->photo5;
    }

    public function setPhoto5($photo5)
    {
        $this->photo5 = $photo5;
    }

    public function getSubphoto5()
    {
        return $this->subphoto5;
    }

    public function setSubphoto5($subphoto5)
    {
        $this->subphoto5 = $subphoto5;
    }

    public function getInc_ffe()
    {
        return $this->inc_ffe;
    }

    public function setInc_ffe($inc_ffe)
    {
        $this->inc_ffe = $inc_ffe;
    }

    public function getDatasource()
    {
        return $this->datasource;
    }

    public function setDatasource($datasource)
    {
        $this->datasource = $datasource;
    }

    public function getConfirm_date()
    {
        return $this->confirm_date;
    }

    public function setConfirm_date($confirm_date)
    {
        $this->confirm_date = $confirm_date;
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

    public function getInspect_date()
    {
        return $this->inspect_date;
    }

    public function setInspect_date($inspect_date)
    {
        $this->inspect_date = $inspect_date;
    }

    public function getInspect_type()
    {
        return $this->inspect_type;
    }

    public function setInspect_type($inspect_type)
    {
        $this->inspect_type = $inspect_type;
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

    public function getMc_file_no()
    {
        return $this->mc_file_no;
    }

    public function setMc_file_no($mc_file_no)
    {
        $this->mc_file_no = $mc_file_no;
    }

    public function getSale_comments()
    {
        return $this->sale_comments;
    }

    public function setSale_comments($sale_comments)
    {
        $this->sale_comments = $sale_comments;
    }

    public function getCap_rate()
    {
        if(!isset($this->cap_rate)){
            return 0;
        }
        return $this->cap_rate;
    }

    public function setCap_rate($cap_rate)
    {
        $this->cap_rate = $cap_rate;
    }

    public function getEgim()
    {
        if(!isset($this->egim)){
            return 0;
        }
        return $this->egim;
    }

    public function setEgim($egim)
    {
        $this->egim = $egim;
    }

    public function getAdj_price_sf_gba()
    {
        if(!isset($this->adj_price_sf_gba)){
            return 0;
        }
        return $this->adj_price_sf_gba;
    }

    public function setAdj_price_sf_gba($adj_price_sf_gba)
    {
        $this->adj_price_sf_gba = $adj_price_sf_gba;
    }

    public function getAdj_price_sf_nra()
    {
        if(!isset($this->adj_price_sf_nra)){
            return 0;
        }
        return $this->adj_price_sf_nra;
    }

    public function setAdj_price_sf_nra($adj_price_sf_nra)
    {
        $this->adj_price_sf_nra = $adj_price_sf_nra;
    }

    public function getConf_comments()
    {
        return $this->conf_comments;
    }

    public function setConf_comments($conf_comments)
    {
        $this->conf_comments = $conf_comments;
    }

    public function getAlloc_imp_value_sf_gba()
    {
        if(!isset($this->alloc_imp_value_sf_gba)){
            return 0;
        }
        return $this->alloc_imp_value_sf_gba;
    }

    public function setAlloc_imp_value_sf_gba($alloc_imp_value_sf_gba)
    {
        $this->alloc_imp_value_sf_gba = $alloc_imp_value_sf_gba;
    }

    public function getAlloc_imp_value_sf_nra()
    {
        if(!isset($this->alloc_imp_value_sf_nra)){
            return 0;
        }
        return $this->alloc_imp_value_sf_nra;
    }

    public function setAlloc_imp_value_sf_nra($alloc_imp_value_sf_nra)
    {
        $this->alloc_imp_value_sf_nra = $alloc_imp_value_sf_nra;
    }

    public function getAdj_price_tunnel()
    {
        return $this->adj_price_tunnel;
    }

    public function setAdj_price_tunnel($adj_price_tunnel)
    {
        $this->adj_price_tunnel = $adj_price_tunnel;
    }

    public function getAdj_price_unit()
    {
        if(!isset($this->adj_price_unit)){
            return 0;
        }
        return $this->adj_price_unit;
    }

    public function setAdj_price_unit($adj_price_unit)
    {
        $this->adj_price_unit = $adj_price_unit;
    }

    public function getFuel_sales_mult()
    {
        return $this->fuel_sales_mult;
    }

    public function setFuel_sales_mult($fuel_sales_mult)
    {
        $this->fuel_sales_mult = $fuel_sales_mult;
    }

    public function getStore_sales_mult()
    {
        return $this->store_sales_mult;
    }

    public function setStore_sales_mult($store_sales_mult)
    {
        $this->store_sales_mult = $store_sales_mult;
    }

    public function getPgim()
    {
        if(!isset($this->pgim)){
            return 0;
        }
        return $this->pgim;
    }

    public function setPgim($pgim)
    {
        $this->pgim = $pgim;
    }

    public function getInd_clear_height()
    {
        return $this->ind_clear_height;
    }

    public function setInd_clear_height($ind_clear_height)
    {
        $this->ind_clear_height = $ind_clear_height;
    }

    public function getInd_ext_office_1()
    {
        return $this->ind_ext_office_1;
    }

    public function setInd_ext_office_1($ind_ext_office_1)
    {
        $this->ind_ext_office_1 = $ind_ext_office_1;
    }

    public function getInd_ext_office_2()
    {
        return $this->ind_ext_office_2;
    }

    public function setInd_ext_office_2($ind_ext_office_2)
    {
        $this->ind_ext_office_2 = $ind_ext_office_2;
    }

    public function getInd_fire()
    {
        return $this->ind_fire;
    }

    public function setInd_fire($ind_fire)
    {
        $this->ind_fire = $ind_fire;
    }

    public function getInd_hvac()
    {
        return $this->ind_hvac;
    }

    public function setInd_hvac($ind_hvac)
    {
        $this->ind_hvac = $ind_hvac;
    }

    public function getInd_int_office_1()
    {
        return $this->ind_int_office_1;
    }

    public function setInd_int_office_1($ind_int_office_1)
    {
        $this->ind_int_office_1 = $ind_int_office_1;
    }

    public function getInd_int_office_2()
    {
        return $this->ind_int_office_2;
    }

    public function setInd_int_office_2($ind_int_office_2)
    {
        $this->ind_int_office_2 = $ind_int_office_2;
    }

    public function getInd_mezz_desc()
    {
        return $this->ind_mezz_desc;
    }

    public function setInd_mezz_desc($ind_mezz_desc)
    {
        $this->ind_mezz_desc = $ind_mezz_desc;
    }

    public function getInd_no_rail()
    {
        return $this->ind_no_rail;
    }

    public function setInd_no_rail($ind_no_rail)
    {
        $this->ind_no_rail = $ind_no_rail;
    }

    public function getInd_pct_office()
    {
        return $this->ind_pct_office;
    }

    public function setInd_pct_office($ind_pct_office)
    {
        $this->ind_pct_office = $ind_pct_office;
    }

    public function getInd_rail()
    {
        return $this->ind_rail;
    }

    public function setInd_rail($ind_rail)
    {
        $this->ind_rail = $ind_rail;
    }

    public function getInd_storage_mess()
    {
        return $this->ind_storage_mess;
    }

    public function setInd_storage_mess($ind_storage_mess)
    {
        $this->ind_storage_mess = $ind_storage_mess;
    }

    public function getInd_storage_mezz_sf()
    {
        return $this->ind_storage_mezz_sf;
    }

    public function setInd_storage_mezz_sf($ind_storage_mezz_sf)
    {
        $this->ind_storage_mezz_sf = $ind_storage_mezz_sf;
    }

    public function getInd_total_office()
    {
        return $this->ind_total_office;
    }

    public function setInd_total_office($ind_total_office)
    {
        $this->ind_total_office = $ind_total_office;
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

    public function getOff_elevator_service()
    {
        return $this->off_elevator_service;
    }

    public function setOff_elevator_service($off_elevator_service)
    {
        $this->off_elevator_service = $off_elevator_service;
    }

    public function getOff_fire_sprinkler()
    {
        return $this->off_fire_sprinkler;
    }

    public function setOff_fire_sprinkler($off_fire_sprinkler)
    {
        $this->off_fire_sprinkler = $off_fire_sprinkler;
    }

    public function getOff_type_hvac()
    {
        return $this->off_type_hvac;
    }

    public function setOff_type_hvac($off_type_hvac)
    {
        $this->off_type_hvac = $off_type_hvac;
    }

    public function getRest_alcohol()
    {
        return $this->rest_alcohol;
    }

    public function setRest_alcohol($rest_alcohol)
    {
        $this->rest_alcohol = $rest_alcohol;
    }

    public function getRest_drive_thru()
    {
        return $this->rest_drive_thru;
    }

    public function setRest_drive_thru($rest_drive_thru)
    {
        $this->rest_drive_thru = $rest_drive_thru;
    }

    public function getRest_no_seats()
    {
        return $this->rest_no_seats;
    }

    public function setRest_no_seats($rest_no_seats)
    {
        $this->rest_no_seats = $rest_no_seats;
    }

    public function getRest_playground()
    {
        return $this->rest_playground;
    }

    public function setRest_playground($rest_playground)
    {
        $this->rest_playground = $rest_playground;
    }

    public function getShop_achor_space_inc()
    {
        return $this->shop_achor_space_inc;
    }

    public function setShop_achor_space_inc($shop_achor_space_inc)
    {
        $this->shop_achor_space_inc = $shop_achor_space_inc;
    }

    public function getShop_anchor_pct()
    {
        return $this->shop_anchor_pct;
    }

    public function setShop_anchor_pct($shop_anchor_pct)
    {
        $this->shop_anchor_pct = $shop_anchor_pct;
    }

    public function getShop_anchor_sf()
    {
        return $this->shop_anchor_sf;
    }

    public function setShop_anchor_sf($shop_anchor_sf)
    {
        $this->shop_anchor_sf = $shop_anchor_sf;
    }

    public function getShop_anchor_tenant()
    {
        return $this->shop_anchor_tenant;
    }

    public function setShop_anchor_tenant($shop_anchor_tenant)
    {
        $this->shop_anchor_tenant = $shop_anchor_tenant;
    }

    public function getShop_inline_pct()
    {
        return $this->shop_inline_pct;
    }

    public function setShop_inline_pct($shop_inline_pct)
    {
        $this->shop_inline_pct = $shop_inline_pct;
    }

    public function getShop_inline_sf()
    {
        return $this->shop_inline_sf;
    }

    public function setShop_inline_sf($shop_inline_sf)
    {
        $this->shop_inline_sf = $shop_inline_sf;
    }

    public function getShop_other_tenant()
    {
        return $this->shop_other_tenant;
    }

    public function setShop_other_tenant($shop_other_tenant)
    {
        $this->shop_other_tenant = $shop_other_tenant;
    }

    public function getShop_total_gba()
    {
        return $this->shop_total_gba;
    }

    public function setShop_total_gba($shop_total_gba)
    {
        $this->shop_total_gba = $shop_total_gba;
    }

    public function getShop_total_nra()
    {
        return $this->shop_total_nra;
    }

    public function setShop_total_nra($shop_total_nra)
    {
        $this->shop_total_nra = $shop_total_nra;
    }

    public function getSs_alarm()
    {
        return $this->ss_alarm;
    }

    public function setSs_alarm($ss_alarm)
    {
        $this->ss_alarm = $ss_alarm;
    }

    public function getSs_boat()
    {
        return $this->ss_boat;
    }

    public function setSs_boat($ss_boat)
    {
        $this->ss_boat = $ss_boat;
    }

    public function getSs_code_access()
    {
        return $this->ss_code_access;
    }

    public function setSs_code_access($ss_code_access)
    {
        $this->ss_code_access = $ss_code_access;
    }

    public function getSs_heat()
    {
        return $this->ss_heat;
    }

    public function setSs_heat($ss_heat)
    {
        $this->ss_heat = $ss_heat;
    }

    public function getSs_on_site()
    {
        return $this->ss_on_site;
    }

    public function setSs_on_site($ss_on_site)
    {
        $this->ss_on_site = $ss_on_site;
    }

    public function getSs_residence()
    {
        return $this->ss_residence;
    }

    public function setSs_residence($ss_residence)
    {
        $this->ss_residence = $ss_residence;
    }

    public function getSs_residence_desc()
    {
        return $this->ss_residence_desc;
    }

    public function setSs_residence_desc($ss_residence_desc)
    {
        $this->ss_residence_desc = $ss_residence_desc;
    }

    public function getSs_security()
    {
        return $this->ss_security;
    }

    public function setSs_security($ss_security)
    {
        $this->ss_security = $ss_security;
    }

    public function getStore_avg_month_gallon()
    {
        return $this->store_avg_month_gallon;
    }

    public function setStore_avg_month_gallon($store_avg_month_gallon)
    {
        $this->store_avg_month_gallon = $store_avg_month_gallon;
    }

    public function getStore_canopy()
    {
        return $this->store_canopy;
    }

    public function setStore_canopy($store_canopy)
    {
        $this->store_canopy = $store_canopy;
    }

    public function getStore_canopy_desc()
    {
        return $this->store_canopy_desc;
    }

    public function setStore_canopy_desc($store_canopy_desc)
    {
        $this->store_canopy_desc = $store_canopy_desc;
    }

    public function getStore_chain_affil()
    {
        return $this->store_chain_affil;
    }

    public function setStore_chain_affil($store_chain_affil)
    {
        $this->store_chain_affil = $store_chain_affil;
    }

    public function getStore_co_chain_affil()
    {
        return $this->store_co_chain_affil;
    }

    public function setStore_co_chain_affil($store_co_chain_affil)
    {
        $this->store_co_chain_affil = $store_co_chain_affil;
    }

    public function getStore_fuel_desc()
    {
        return $this->store_fuel_desc;
    }

    public function setStore_fuel_desc($store_fuel_desc)
    {
        $this->store_fuel_desc = $store_fuel_desc;
    }

    public function getStore_month_car_wash_sales()
    {
        return $this->store_month_car_wash_sales;
    }

    public function setStore_month_car_wash_sales($store_month_car_wash_sales)
    {
        $this->store_month_car_wash_sales = $store_month_car_wash_sales;
    }

    public function getStore_month_mini_sales()
    {
        return $this->store_month_mini_sales;
    }

    public function setStore_month_mini_sales($store_month_mini_sales)
    {
        $this->store_month_mini_sales = $store_month_mini_sales;
    }

    public function getStore_month_store_sales()
    {
        return $this->store_month_store_sales;
    }

    public function setStore_month_store_sales($store_month_store_sales)
    {
        $this->store_month_store_sales = $store_month_store_sales;
    }

    public function getStore_no_fuel()
    {
        return $this->store_no_fuel;
    }

    public function setStore_no_fuel($store_no_fuel)
    {
        $this->store_no_fuel = $store_no_fuel;
    }

    public function getStore_total_month_sales()
    {
        return $this->store_total_month_sales;
    }

    public function setStore_total_month_sales($store_total_month_sales)
    {
        $this->store_total_month_sales = $store_total_month_sales;
    }

    public function getVeh_level()
    {
        return $this->veh_level;
    }

    public function setVeh_level($veh_level)
    {
        $this->veh_level = $veh_level;
    }

    public function getVeh_service_sf()
    {
        return $this->veh_service_sf;
    }

    public function setVeh_service_sf($veh_service_sf)
    {
        $this->veh_service_sf = $veh_service_sf;
    }

    public function getVeh_showroom_pct()
    {
        return $this->veh_showroom_pct;
    }

    public function setVeh_showroom_pct($veh_showroom_pct)
    {
        $this->veh_showroom_pct = $veh_showroom_pct;
    }

    public function getVeh_showroom_sf()
    {
        return $this->veh_showroom_sf;
    }

    public function setVeh_showroom_sf($veh_showroom_sf)
    {
        $this->veh_showroom_sf = $veh_showroom_sf;
    }

    public function getVeh_tunnel()
    {
        return $this->veh_tunnel;
    }

    public function setVeh_tunnel($veh_tunnel)
    {
        $this->veh_tunnel = $veh_tunnel;
    }

    public function getWash_dry()
    {
        return $this->wash_dry;
    }

    public function setWash_dry($wash_dry)
    {
        $this->wash_dry = $wash_dry;
    }

    public function getExercise()
    {
        return $this->exercise;
    }

    public function setExercise($exercise)
    {
        $this->exercise = $exercise;
    }

    public function getSpa()
    {
        return $this->spa;
    }

    public function setSpa($spa)
    {
        $this->spa = $spa;
    }

    public function getOther_amenities()
    {
        return $this->other_amenities;
    }

    public function setOther_amenities($other_amenities)
    {
        $this->other_amenities = $other_amenities;
    }

    public function getNo_single_wide()
    {
        return $this->no_single_wide;
    }

    public function setNo_single_wide($no_single_wide)
    {
        $this->no_single_wide = $no_single_wide;
    }

    public function getNo_triple_wide()
    {
        return $this->no_triple_wide;
    }

    public function setNo_triple_wide($no_triple_wide)
    {
        $this->no_triple_wide = $no_triple_wide;
    }

    public function getNo_double_wide()
    {
        return $this->no_double_wide;
    }

    public function setNo_double_wide($no_double_wide)
    {
        $this->no_double_wide = $no_double_wide;
    }

    public function getNo_rv_space()
    {
        return $this->no_rv_space;
    }

    public function setNo_rv_space($no_rv_space)
    {
        $this->no_rv_space = $no_rv_space;
    }

    public function getTotal_space()
    {
        if(!isset($this->total_space)){
            return 0;
        }
        return $this->total_space;
    }

    public function setTotal_space($total_space)
    {
        $this->total_space = $total_space;
    }

    public function getOther_building_desc()
    {
        return $this->other_building_desc;
    }

    public function setOther_building_desc($other_building_desc)
    {
        $this->other_building_desc = $other_building_desc;
    }

    public function getPark_cond()
    {
        return $this->park_cond;
    }

    public function setPark_cond($park_cond)
    {
        $this->park_cond = $park_cond;
    }

    public function getPark_quality()
    {
        return $this->park_quality;
    }

    public function setPark_quality($park_quality)
    {
        $this->park_quality = $park_quality;
    }

    public function getSpace_acre()
    {
        return $this->space_acre;
    }

    public function setSpace_acre($space_acre)
    {
        $this->space_acre = $space_acre;
    }

    public function getPrice_space()
    {
        return $this->price_space;
    }

    public function setPrice_space($price_space)
    {
        $this->price_space = $price_space;
    }

    public function getNoi_space()
    {
        return $this->noi_space;
    }

    public function setNoi_space($noi_space)
    {
        $this->noi_space = $noi_space;
    }

    public function getExpense_space()
    {
        return $this->expense_space;
    }

    public function setExpense_space($expense_space)
    {
        $this->expense_space = $expense_space;
    }

    public function getNo_other_building()
    {
        return $this->no_other_building;
    }

    public function setNo_other_building($no_other_building)
    {
        $this->no_other_building = $no_other_building;
    }

    public function getPgi_space()
    {
        return $this->pgi_space;
    }

    public function setPgi_space($pgi_space)
    {
        $this->pgi_space = $pgi_space;
    }

    public function getVacancy_space()
    {
        return $this->vacancy_space;
    }

    public function setVacancy_space($vacancy_space)
    {
        $this->vacancy_space = $vacancy_space;
    }

    public function getEgi_space()
    {
        return $this->egi_space;
    }

    public function setEgi_space($egi_space)
    {
        $this->egi_space = $egi_space;
    }

    public function getTotal_no_units()
    {
        return $this->total_no_units;
    }

    public function setTotal_no_units($total_no_units)
    {
        $this->total_no_units = $total_no_units;
    }

    public function getDensity()
    {
        if(!isset($this->density)){
            return 0;
        }
        return $this->density;
    }

    public function setDensity($density)
    {
        $this->density = $density;
    }

    public function getAvg_unit_size()
    {
        if(!isset($this->avg_unit_size)){
            return 0;
        }
        return $this->avg_unit_size;
    }

    public function setAvg_unit_size($avg_unit_size)
    {
        $this->avg_unit_size = $avg_unit_size;
    }

    public function getTotal_bedroom()
    {
        return $this->total_bedroom;
    }

    public function setTotal_bedroom($total_bedroom)
    {
        $this->total_bedroom = $total_bedroom;
    }

    public function getBedroom_ratio()
    {
        if(!isset($this->bedroom_ratio)){
            return 0;
        }
        return $this->bedroom_ratio;
    }

    public function setBedroom_ratio($bedroom_ratio)
    {
        $this->bedroom_ratio = $bedroom_ratio;
    }

    public function getParking_ratio_unit()
    {
        if(!isset($this->parking_ratio_unit)){
            return 0;
        }
        return $this->parking_ratio_unit;
    }

    public function setParking_ratio_unit($parking_ratio_unit)
    {
        $this->parking_ratio_unit = $parking_ratio_unit;
    }

    public function getSubsidized_project()
    {
        return $this->subsidized_project;
    }

    public function setSubsidized_project($subsidized_project)
    {
        $this->subsidized_project = $subsidized_project;
    }

    public function getSubsidized_project_desc()
    {
        return $this->subsidized_project_desc;
    }

    public function setSubsidized_project_desc($subsidized_project_desc)
    {
        $this->subsidized_project_desc = $subsidized_project_desc;
    }

    public function getAvg_month_rent_unit()
    {
        return $this->avg_month_rent_unit;
    }

    public function setAvg_month_rent_unit($avg_month_rent_unit)
    {
        $this->avg_month_rent_unit = $avg_month_rent_unit;
    }

    public function getAvg_month_rent_sf()
    {
        if(!isset($this->avg_month_rent_sf)){
            return 0;
        }
        return $this->avg_month_rent_sf;
    }

    public function setAvg_month_rent_sf($avg_month_rent_sf)
    {
        $this->avg_month_rent_sf = $avg_month_rent_sf;
    }

    public function getAnnual_turnover_pct()
    {
        return $this->annual_turnover_pct;
    }

    public function setAnnual_turnover_pct($annual_turnover_pct)
    {
        $this->annual_turnover_pct = $annual_turnover_pct;
    }

    public function getTotal_rooms()
    {
        return $this->total_rooms;
    }

    public function setTotal_rooms($total_rooms)
    {
        $this->total_rooms = $total_rooms;
    }

    public function getPgi_unit()
    {
        if(!isset($this->pgi_unit)){
            return 0;
        }
        return $this->pgi_unit;
    }

    public function setPgi_unit($pgi_unit)
    {
        $this->pgi_unit = $pgi_unit;
    }

    public function getExpense_unit()
    {
        if(!isset($this->expense_unit)){
            return 0;
        }
        return $this->expense_unit;
    }

    public function setExpense_unit($expense_unit)
    {
        $this->expense_unit = $expense_unit;
    }

    public function getVacancy_unit()
    {
        if(!isset($this->vacancy_unit)){
            return 0;
        }
        return $this->vacancy_unit;
    }

    public function setVacancy_unit($vacancy_unit)
    {
        $this->vacancy_unit = $vacancy_unit;
    }

    public function getNoi_unit()
    {
        if(!isset($this->noi_unit)){
            return 0;
        }
        return $this->noi_unit;
    }

    public function setNoi_unit($noi_unit)
    {
        $this->noi_unit = $noi_unit;
    }

    public function getEgi_unit()
    {
        if(!isset($this->egi_unit)){
            return 0;
        }
        return $this->egi_unit;
    }

    public function setEgi_unit($egi_unit)
    {
        $this->egi_unit = $egi_unit;
    }

    public function getTotal_storage_units()
    {
        return $this->total_storage_units;
    }

    public function setTotal_storage_units($total_storage_units)
    {
        $this->total_storage_units = $total_storage_units;
    }

  public function getAssessedyear() {
    return $this->assessedyear;
  }

  public function setAssessedyear( $assessedyear ) {
    $this->assessedyear = $assessedyear;
  }    

  public function getRmvland() {
    return $this->rmvland;
  }

  public function setRmvland( $rmvland ) {
    $this->rmvland = $rmvland;
  }  

  public function getRmvimp() {
    return $this->rmvimp;
  }

  public function setRmvimp( $rmvimp ) {
    $this->rmvimp = $rmvimp;
  }  

  public function getRmvtotal() {
    return $this->rmvtotal;
  }

  public function setRmvtotal( $rmvtotal ) {
    $this->rmvtotal = $rmvtotal;
  }  

  public function getTaxes() {
    return $this->taxes;
  }

  public function setTaxes( $taxes ) {
    $this->taxes = $taxes;
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
	
    public function getSfbedroom()
    {
        if(!isset($this->sfbedroom)){
            return 0;
        }
        return $this->sfbedroom;
    }

    public function setSfbedroom($sfbedroom)
    {
        $this->sfbedroom = $sfbedroom;
    }
	
    public function getSffullbath()
    {
        if(!isset($this->sffullbath)){
            return 0;
        }
        return $this->sffullbath;
    }

    public function setSffullbath($sffullbath)
    {
        $this->sffullbath = $sffullbath;
    }
	
    public function getSfhalfbath()
    {
        if(!isset($this->sfhalfbath)){
            return 0;
        }
        return $this->sfhalfbath;
    }

    public function setSfhalfbath($sfhalfbath)
    {
        $this->sfhalfbath = $sfhalfbath;
    }
	
    public function getAddstructures()
    {
        return $this->addstructures;
    }

    public function setAddstructures($addstructures)
    {
        $this->addstructures = $addstructures;
    }

    function __construct(){}

    function __destruct(){}
}

?>