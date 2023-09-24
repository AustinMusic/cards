<?php
class landsales{
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
    public $county;
    public $state;
    public $zip_code;
    public $lat;
    public $lng;
    public $propertytype;
    public $propertysubtype;
    public $msa;
    public $genmarket;
    public $submarkid;
    public $legal_desc;
    public $photo1;
    public $image;
    public $thumbnail;
    public $platmap;
	public $platimage;
    public $streetview;
    public $gla_inputtype;
    public $gla_inputsize;
    public $gross_land_acre;
    public $gross_land_sf;
    public $unusable_sf;
    public $unusable_acre;
    public $unusable_desc;
    public $net_usable_sf;
    public $net_usable_acre;
    public $net_usable_desc;
    public $shape;
    public $topography;
    public $utilities;
    public $flood_plain;
    public $fppanel;
    public $orientation;
    public $site_access;
    public $exposure;
    public $easement;
    public $easement_desc;
    public $soiltype;
    public $irrigation;
    public $other_land_comments;
    public $change_zoning;
    public $zoning_juris; 
    public $zoning_code;
    public $zoning_desc;
    public $inc_far;
    public $fut_zoning_code;
    public $fut_zoning_juris;
    public $fut_zoning_desc;
    public $rezone_time;
    public $max_building_ht;
    public $floor_area_ratio;
    public $max_floor_area;
    public $traffic_count;
    public $traffic_date;
    public $inter_street;
    public $rural_electricity;
    public $well_septic;
    public $municiple_sewer;
    public $municiple_water;
    public $natural_gas;
    public $telephone;
    public $cable_tv;
    public $property_appraised;
    public $mc_job;
    public $appraiser_name;
    public $appraiser_name_two;
    public $grantor;
    public $grantee;
    public $proposed_building;
    public $ground_lease;
    public $land_alloc_sale;
    public $sale_price;
    public $less_alloc_imp_price;
    public $improve_value_source;
    public $alloc_land_value;
    public $prop_rights_conv;
    public $interest_conv;
    public $conv_doc_type;
    public $conv_doc_rec_no;
    public $record_date;
    public $record_date_two;
    public $sale_status;
    public $market_time;
    public $current_use;
    public $proposed_use_change;
    public $proposed_use_desc;
    public $fee_equiv_price;
    public $fee_simple_equiv_price;
    public $cash_equiv_price;
    public $type_finance;
    public $list_price_avail;
    public $list_price;
    public $list_price_change;
    public $datasource;
    public $inspect_date;
    public $confirm_date;
    public $inspect_type;
    public $mc_file_no;
    public $confirm_1_source;
    public $relationship_1;
    public $confirm_2_souce;
    public $relationship_2;
    public $market_flyer;
    public $gl_development_name;
    public $gl_year_built;
    public $gl_total_project;
    public $gl_leased_land_sf;
    public $gl_building_footprint;
    public $gl_anchor_tenants;
    public $gl_major_tenants;
    public $gl_status;
    public $gl_start_date;
    public $gl_end_date;
    public $gl_options_period;
    public $gl_escalations;
    public $gl_length;
    public $gl_rent_begin;
    public $gl_rent_per_sf_land;
    public $gl_rent_per_sf_footprint;
    public $gl_fee_simple_equiv;
    public $gl_fee_equiv_per_sf;
    public $gl_rate_return;
    public $floor_1_gba;
    public $site_cover_primary;
    public $floor_2_gba;
    public $land_build_ratio_primary;
    public $total_basement_gba;
    public $gba_source;
    public $overall_gba;
    public $fin_term_adj;
    public $fin_term_adj_desc;
    public $cond_sale_adj;
    public $cond_sale_desc;
    public $demo_cost;
    public $demo_cost_desc;
    public $onsite_extra_cost;
    public $onsite_extra_cost_desc;
    public $offsite_develop;
    public $offsite_develop_desc;
    public $broker_cost;
    public $broker_cost_desc;
    public $eff_sale_price_stab;
    public $adj_price_comment;
    public $inc_ffe;
    public $value_ffe;
    public $desc_ffe;
    public $type_land_radio;
    public $type_residential_land;
    public $lot_complete_date;
    public $unit_lot_type;
    public $fut_avg_home_price;
    public $no_lots;
    public $fut_avg_home_price2;
    public $unadj_sale_price;
    public $lot_home_price_ratio;
    public $unit_density_net_acre;
    public $hard_cost_lot;
    public $off_site_imp;
    public $fut_finish_size_range;
    public $fut_finish_size_avg;
    public $value_entitle;
    public $inc_entitlement;
    public $value_entitlement_lot;
    public $site_amenities;
    public $proj_fut_avg_finish_price;
    public $adj_price_finish_with;
    public $sale_price_lot_with;
    public $sale_price_net_acre_with;
    public $price_net_sf_with;
    public $adj_price_finished_wo;
    public $sale_price_lot_wo;
    public $sale_price_net_acre_wo;
    public $price_net_sf_wo;
    public $ind_lot_nos;
    public $finish_lot_size_range;
    public $finish_lot_size_sfba;
    public $finish_lot_size_sf;
    public $lot_topography;
    public $project_amenities;
    public $original_price;
    public $other_lot_comment;
    public $adj_bulk_sale_price;
    public $bulk_price_lot;
    public $bulk_price_sf_avg;
    public $report_price_lot;
    public $ind_sale_pct_discount;
    public $adj_price_acre_gross;
    public $adj_price_acre_net;
    public $adj_price_sf_pad;
    public $adj_price_sf_gross;
    public $adj_price_sf_net;
    public $adj_price_sf_far;
    public $adjhomesite;
    public $sale_comments;
    public $conf_comments;
    public $assessedyear;
    public $rmvland;
    public $rmvimp;
    public $rmvtotal;
    public $taxes;
    public $docData;
    public $assessedvalues;
	public $confirm1;
	public $confirm2;
    public $emdomain;
    public $waterrights;
    public $irigwell;
    public $dwellrights;
    public $homesite;
    public $nohomesite;

  public function getAssessedvalues() {
    if ( !isset( $this->assessedvalues ) ) {
      return array();
    }
    return $this->assessedvalues;
  }

  public function setAssessedvalues( $assessedvalues ) {
    $this->assessedvalues = $assessedvalues;
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
        return $this->propertytype;
    }

    public function setPropertytype($propertytype)
    {
        $this->propertytype = $propertytype;
    }

    public function getPropertysubtype()
    {
        return $this->propertysubtype;
    }

    public function setPropertysubtype($propertysubtype)
    {
        $this->propertysubtype = $propertysubtype;
    }

    public function getMsa()
    {
        return $this->msa;
    }

    public function setMsa($msa)
    {
        $this->msa = $msa;
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

    public function getLegal_desc()
    {
        return $this->legal_desc;
    }

    public function setLegal_desc($legal_desc)
    {
        $this->legal_desc = $legal_desc;
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

    public function getStreetview()
    {
        return $this->streetview;
    }

    public function setStreetview($streetview)
    {
        $this->streetview = $streetview;
    }
	
	public function getStreetimage()
    {
        return $this->streetimage;
    }

    public function setStreetimage($streetimage)
    {
        $this->streetimage = $streetimage;
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

    public function getGross_land_acre()
    {
        return $this->gross_land_acre;
    }

    public function setGross_land_acre($gross_land_acre)
    {
        $this->gross_land_acre = $gross_land_acre;
    }

    public function getGross_land_sf()
    {
        return $this->gross_land_sf;
    }

    public function setGross_land_sf($gross_land_sf)
    {
        $this->gross_land_sf = $gross_land_sf;
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

    public function getNet_usable_sf()
    {
        return $this->net_usable_sf;
    }

    public function setNet_usable_sf($net_usable_sf)
    {
        $this->net_usable_sf = $net_usable_sf;
    }

    public function getNet_usable_acre()
    {
        return $this->net_usable_acre;
    }

    public function setNet_usable_acre($net_usable_acre)
    {
        $this->net_usable_acre = $net_usable_acre;
    }

    public function getNet_usable_desc()
    {
        return $this->net_usable_desc;
    }

    public function setNet_usable_desc($net_usable_desc)
    {
        $this->net_usable_desc = $net_usable_desc;
    }

    public function getShape()
    {
        return $this->shape;
    }

    public function setShape($shape)
    {
        $this->shape = $shape;
    }

    public function getTopography()
    {
        return $this->topography;
    }

    public function setTopography($topography)
    {
        $this->topography = $topography;
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

    public function getOrientation()
    {
        return $this->orientation;
    }

    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    }

    public function getSite_access()
    {
        return $this->site_access;
    }

    public function setSite_access($site_access)
    {
        $this->site_access = $site_access;
    }

    public function getExposure()
    {
        return $this->exposure;
    }

    public function setExposure($exposure)
    {
        $this->exposure = $exposure;
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

    public function getSoiltype()
    {
        return $this->soiltype;
    }

    public function setSoiltype($soiltype)
    {
        $this->soiltype = $soiltype;
    }

    public function getIrrigation()
    {
        return $this->irrigation;
    }

    public function setIrrigation($irrigation)
    {
        $this->irrigation = $irrigation;
    }

    public function getOther_land_comments()
    {
        return $this->other_land_comments;
    }

    public function setOther_land_comments($other_land_comments)
    {
        $this->other_land_comments = $other_land_comments;
    }

    public function getChange_zoning()
    {
        return $this->change_zoning;
    }

    public function setChange_zoning($change_zoning)
    {
        $this->change_zoning = $change_zoning;
    }

    public function getZoning_juris()
    {
        return $this->zoning_juris;
    }

    public function setZoning_juris($zoning_juris)
    {
        $this->zoning_juris = $zoning_juris;
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

    public function getInc_far()
    {
        if(!isset($this->inc_far)){
            return 0;
        }
        return $this->inc_far;
    }

    public function setInc_far($inc_far)
    {
        $this->inc_far = $inc_far;
    }

    public function getFut_zoning_code()
    {
        return $this->fut_zoning_code;
    }

    public function setFut_zoning_code($fut_zoning_code)
    {
        $this->fut_zoning_code = $fut_zoning_code;
    }

    public function getFut_zoning_juris()
    {
        return $this->fut_zoning_juris;
    }

    public function setFut_zoning_juris($fut_zoning_juris)
    {
        $this->fut_zoning_juris = $fut_zoning_juris;
    }

    public function getFut_zoning_desc()
    {
        return $this->fut_zoning_desc;
    }

    public function setFut_zoning_desc($fut_zoning_desc)
    {
        $this->fut_zoning_desc = $fut_zoning_desc;
    }

    public function getRezone_time()
    {
        return $this->rezone_time;
    }

    public function setRezone_time($rezone_time)
    {
        $this->rezone_time = $rezone_time;
    }

    public function getMax_building_ht()
    {
        return $this->max_building_ht;
    }

    public function setMax_building_ht($max_building_ht)
    {
        $this->max_building_ht = $max_building_ht;
    }

    public function getFloor_area_ratio()
    {
        return $this->floor_area_ratio;
    }

    public function setFloor_area_ratio($floor_area_ratio)
    {
        $this->floor_area_ratio = $floor_area_ratio;
    }

    public function getMax_floor_area()
    {
        return $this->max_floor_area;
    }

    public function setMax_floor_area($max_floor_area)
    {
        $this->max_floor_area = $max_floor_area;
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

    public function getRural_electricity()
    {
        return $this->rural_electricity;
    }

    public function setRural_electricity($rural_electricity)
    {
        $this->rural_electricity = $rural_electricity;
    }

    public function getWell_septic()
    {
        return $this->well_septic;
    }

    public function setWell_septic($well_septic)
    {
        $this->well_septic = $well_septic;
    }

    public function getMuniciple_sewer()
    {
        return $this->municiple_sewer;
    }

    public function setMuniciple_sewer($municiple_sewer)
    {
        $this->municiple_sewer = $municiple_sewer;
    }

    public function getMuniciple_water()
    {
        return $this->municiple_water;
    }

    public function setMuniciple_water($municiple_water)
    {
        $this->municiple_water = $municiple_water;
    }

    public function getNatural_gas()
    {
        return $this->natural_gas;
    }

    public function setNatural_gas($natural_gas)
    {
        $this->natural_gas = $natural_gas;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getCable_tv()
    {
        return $this->cable_tv;
    }

    public function setCable_tv($cable_tv)
    {
        $this->cable_tv = $cable_tv;
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

    public function getMc_job()
    {
        return $this->mc_job;
    }

    public function setMc_job($mc_job)
    {
        $this->mc_job = $mc_job;
    }

    public function getAppraiser_name()
    {
        return $this->appraiser_name;
    }

    public function setAppraiser_name($appraiser_name)
    {
        $this->appraiser_name = $appraiser_name;
    }

    public function getAppraiser_name_two()
    {
        return $this->appraiser_name_two;
    }

    public function setAppraiser_name_two($appraiser_name_two)
    {
        $this->appraiser_name_two = $appraiser_name_two;
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

    public function getProposed_building()
    {
        if(!isset($this->proposed_building)){
            return 0;
        }
        return $this->proposed_building;
    }

    public function setProposed_building($proposed_building)
    {
        $this->proposed_building = $proposed_building;
    }

    public function getGround_lease()
    {
        if(!isset($this->ground_lease)){
            return 0;
        }
        return $this->ground_lease;
    }

    public function setGround_lease($ground_lease)
    {
        $this->ground_lease = $ground_lease;
    }

    public function getLand_alloc_sale()
    {
        if(!isset($this->land_alloc_sale)){
            return 0;
        }
        return $this->land_alloc_sale;
    }

    public function setLand_alloc_sale($land_alloc_sale)
    {
        $this->land_alloc_sale = $land_alloc_sale;
    }

    public function getSale_price()
    {
        return $this->sale_price;
    }

    public function setSale_price($sale_price)
    {
        $this->sale_price = $sale_price;
    }

    public function getLess_alloc_imp_price()
    {
        return $this->less_alloc_imp_price;
    }

    public function setLess_alloc_imp_price($less_alloc_imp_price)
    {
        $this->less_alloc_imp_price = $less_alloc_imp_price;
    }

    public function getImprove_value_source()
    {
        return $this->improve_value_source;
    }

    public function setImprove_value_source($improve_value_source)
    {
        $this->improve_value_source = $improve_value_source;
    }

    public function getAlloc_land_value()
    {
        return $this->alloc_land_value;
    }

    public function setAlloc_land_value($alloc_land_value)
    {
        $this->alloc_land_value = $alloc_land_value;
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

    public function getRecord_date()
    {
        return $this->record_date;
    }

    public function setRecord_date($record_date)
    {
        $this->record_date = $record_date;
    }

    public function getRecord_date_two()
    {
        return $this->record_date_two;
    }

    public function setRecord_date_two($record_date_two)
    {
        $this->record_date_two = $record_date_two;
    }

    public function getSale_status()
    {
        return $this->sale_status;
    }

    public function setSale_status($sale_status)
    {
        $this->sale_status = $sale_status;
    }

    public function getMarket_time()
    {
        return $this->market_time;
    }

    public function setMarket_time($market_time)
    {
        $this->market_time = $market_time;
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

    public function getFee_equiv_price()
    {
        return $this->fee_equiv_price;
    }

    public function setFee_equiv_price($fee_equiv_price)
    {
        $this->fee_equiv_price = $fee_equiv_price;
    }

    public function getFee_simple_equiv_price()
    {
        return $this->fee_simple_equiv_price;
    }

    public function setFee_simple_equiv_price($fee_simple_equiv_price)
    {
        $this->fee_simple_equiv_price = $fee_simple_equiv_price;
    }

    public function getCash_equiv_price()
    {
        return $this->cash_equiv_price;
    }

    public function setCash_equiv_price($cash_equiv_price)
    {
        $this->cash_equiv_price = $cash_equiv_price;
    }

    public function getType_finance()
    {
        return $this->type_finance;
    }

    public function setType_finance($type_finance)
    {
        $this->type_finance = $type_finance;
    }

    public function getList_price_avail()
    {
        if(!isset($this->list_price_avail)){
            return 0;
        }
        return $this->list_price_avail;
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

    public function getDatasource()
    {
        return $this->datasource;
    }

    public function setDatasource($datasource)
    {
        $this->datasource = $datasource;
    }

    public function getInspect_date()
    {
        return $this->inspect_date;
    }

    public function setInspect_date($inspect_date)
    {
        $this->inspect_date = $inspect_date;
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

    public function getGl_development_name()
    {
        return $this->gl_development_name;
    }

    public function setGl_development_name($gl_development_name)
    {
        $this->gl_development_name = $gl_development_name;
    }

    public function getGl_year_built()
    {
        return $this->gl_year_built;
    }

    public function setGl_year_built($gl_year_built)
    {
        $this->gl_year_built = $gl_year_built;
    }

    public function getGl_total_project()
    {
		if(!isset($this->gl_total_project)){
            return 0;
        }
        return intval($this->gl_total_project);
    }

    public function setGl_total_project($gl_total_project)
    {
        $this->gl_total_project = $gl_total_project;
    }

    public function getGl_leased_land_sf()
    {
        return $this->gl_leased_land_sf;
    }

    public function setGl_leased_land_sf($gl_leased_land_sf)
    {
        $this->gl_leased_land_sf = $gl_leased_land_sf;
    }

    public function getGl_building_footprint()
    {
        return $this->gl_building_footprint;
    }

    public function setGl_building_footprint($gl_building_footprint)
    {
        $this->gl_building_footprint = $gl_building_footprint;
    }

    public function getGl_anchor_tenants()
    {
        return $this->gl_anchor_tenants;
    }

    public function setGl_anchor_tenants($gl_anchor_tenants)
    {
        $this->gl_anchor_tenants = $gl_anchor_tenants;
    }

    public function getGl_major_tenants()
    {
        return $this->gl_major_tenants;
    }

    public function setGl_major_tenants($gl_major_tenants)
    {
        $this->gl_major_tenants = $gl_major_tenants;
    }

    public function getGl_status()
    {
        return $this->gl_status;
    }

    public function setGl_status($gl_status)
    {
        $this->gl_status = $gl_status;
    }

    public function getGl_start_date()
    {
        return $this->gl_start_date;
    }

    public function setGl_start_date($gl_start_date)
    {
        $this->gl_start_date = $gl_start_date;
    }

    public function getGl_end_date()
    {
        return $this->gl_end_date;
    }

    public function setGl_end_date($gl_end_date)
    {
        $this->gl_end_date = $gl_end_date;
    }

    public function getGl_options_period()
    {
        return $this->gl_options_period;
    }

    public function setGl_options_period($gl_options_period)
    {
        $this->gl_options_period = $gl_options_period;
    }

    public function getGl_escalations()
    {
        return $this->gl_escalations;
    }

    public function setGl_escalations($gl_escalations)
    {
        $this->gl_escalations = $gl_escalations;
    }

    public function getGl_length()
    {
        return $this->gl_length;
    }

    public function setGl_length($gl_length)
    {
        $this->gl_length = $gl_length;
    }

    public function getGl_rent_begin()
    {
        return $this->gl_rent_begin;
    }

    public function setGl_rent_begin($gl_rent_begin)
    {
        $this->gl_rent_begin = $gl_rent_begin;
    }

    public function getGl_rent_per_sf_land()
    {
        return $this->gl_rent_per_sf_land;
    }

    public function setGl_rent_per_sf_land($gl_rent_per_sf_land)
    {
        $this->gl_rent_per_sf_land = $gl_rent_per_sf_land;
    }

    public function getGl_rent_per_sf_footprint()
    {
        return $this->gl_rent_per_sf_footprint;
    }

    public function setGl_rent_per_sf_footprint($gl_rent_per_sf_footprint)
    {
        $this->gl_rent_per_sf_footprint = $gl_rent_per_sf_footprint;
    }

    public function getGl_fee_simple_equiv()
    {
        return $this->gl_fee_simple_equiv;
    }

    public function setGl_fee_simple_equiv($gl_fee_simple_equiv)
    {
        $this->gl_fee_simple_equiv = $gl_fee_simple_equiv;
    }

    public function getGl_fee_equiv_per_sf()
    {
        return $this->gl_fee_equiv_per_sf;
    }

    public function setGl_fee_equiv_per_sf($gl_fee_equiv_per_sf)
    {
        $this->gl_fee_equiv_per_sf = $gl_fee_equiv_per_sf;
    }

    public function getGl_rate_return()
    {
        return $this->gl_rate_return;
    }

    public function setGl_rate_return($gl_rate_return)
    {
        $this->gl_rate_return = $gl_rate_return;
    }

    public function getFloor_1_gba()
    {
        return $this->floor_1_gba;
    }

    public function setFloor_1_gba($floor_1_gba)
    {
        $this->floor_1_gba = $floor_1_gba;
    }

    public function getSite_cover_primary()
    {
        return $this->site_cover_primary;
    }

    public function setSite_cover_primary($site_cover_primary)
    {
        $this->site_cover_primary = $site_cover_primary;
    }

    public function getFloor_2_gba()
    {
        return $this->floor_2_gba;
    }

    public function setFloor_2_gba($floor_2_gba)
    {
        $this->floor_2_gba = $floor_2_gba;
    }

    public function getLand_build_ratio_primary()
    {
        return $this->land_build_ratio_primary;
    }

    public function setLand_build_ratio_primary($land_build_ratio_primary)
    {
        $this->land_build_ratio_primary = $land_build_ratio_primary;
    }

    public function getTotal_basement_gba()
    {
        return $this->total_basement_gba;
    }

    public function setTotal_basement_gba($total_basement_gba)
    {
        $this->total_basement_gba = $total_basement_gba;
    }

    public function getGba_source()
    {
        return $this->gba_source;
    }

    public function setGba_source($gba_source)
    {
        $this->gba_source = $gba_source;
    }

    public function getOverall_gba()
    {
        return $this->overall_gba;
    }

    public function setOverall_gba($overall_gba)
    {
        $this->overall_gba = $overall_gba;
    }

    public function getFin_term_adj()
    {
        return $this->fin_term_adj;
    }

    public function setFin_term_adj($fin_term_adj)
    {
        $this->fin_term_adj = $fin_term_adj;
    }

    public function getFin_term_adj_desc()
    {
        return $this->fin_term_adj_desc;
    }

    public function setFin_term_adj_desc($fin_term_adj_desc)
    {
        $this->fin_term_adj_desc = $fin_term_adj_desc;
    }

    public function getCond_sale_adj()
    {
        return $this->cond_sale_adj;
    }

    public function setCond_sale_adj($cond_sale_adj)
    {
        $this->cond_sale_adj = $cond_sale_adj;
    }

    public function getCond_sale_desc()
    {
        return $this->cond_sale_desc;
    }

    public function setCond_sale_desc($cond_sale_desc)
    {
        $this->cond_sale_desc = $cond_sale_desc;
    }

    public function getDemo_cost()
    {
        return $this->demo_cost;
    }

    public function setDemo_cost($demo_cost)
    {
        $this->demo_cost = $demo_cost;
    }

    public function getDemo_cost_desc()
    {
        return $this->demo_cost_desc;
    }

    public function setDemo_cost_desc($demo_cost_desc)
    {
        $this->demo_cost_desc = $demo_cost_desc;
    }

    public function getOnsite_extra_cost()
    {
        return $this->onsite_extra_cost;
    }

    public function setOnsite_extra_cost($onsite_extra_cost)
    {
        $this->onsite_extra_cost = $onsite_extra_cost;
    }

    public function getOnsite_extra_cost_desc()
    {
        return $this->onsite_extra_cost_desc;
    }

    public function setOnsite_extra_cost_desc($onsite_extra_cost_desc)
    {
        $this->onsite_extra_cost_desc = $onsite_extra_cost_desc;
    }

    public function getOffsite_develop()
    {
        return $this->offsite_develop;
    }

    public function setOffsite_develop($offsite_develop)
    {
        $this->offsite_develop = $offsite_develop;
    }

    public function getOffsite_develop_desc()
    {
        return $this->offsite_develop_desc;
    }

    public function setOffsite_develop_desc($offsite_develop_desc)
    {
        $this->offsite_develop_desc = $offsite_develop_desc;
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

    public function getEff_sale_price_stab()
    {
        return $this->eff_sale_price_stab;
    }

    public function setEff_sale_price_stab($eff_sale_price_stab)
    {
        $this->eff_sale_price_stab = $eff_sale_price_stab;
    }

    public function getAdj_price_comment()
    {
        return $this->adj_price_comment;
    }

    public function setAdj_price_comment($adj_price_comment)
    {
        $this->adj_price_comment = $adj_price_comment;
    }

    public function getInc_ffe()
    {
        return $this->inc_ffe;
    }

    public function setInc_ffe($inc_ffe)
    {
        $this->inc_ffe = $inc_ffe;
    }

    public function getValue_ffe()
    {
        return $this->value_ffe;
    }

    public function setValue_ffe($value_ffe)
    {
        $this->value_ffe = $value_ffe;
    }

    public function getDesc_ffe()
    {
        return $this->desc_ffe;
    }

    public function setDesc_ffe($desc_ffe)
    {
        $this->desc_ffe = $desc_ffe;
    }

    public function getType_land_radio()
    {
        return $this->type_land_radio;
    }

    public function setType_land_radio($type_land_radio)
    {
        $this->type_land_radio = $type_land_radio;
    }

    public function getType_residential_land()
    {
        return $this->type_residential_land;
    }

    public function setType_residential_land($type_residential_land)
    {
        $this->type_residential_land = $type_residential_land;
    }

    public function getLot_complete_date()
    {
        return $this->lot_complete_date;
    }

    public function setLot_complete_date($lot_complete_date)
    {
        $this->lot_complete_date = $lot_complete_date;
    }

    public function getUnit_lot_type()
    {
        return $this->unit_lot_type;
    }

    public function setUnit_lot_type($unit_lot_type)
    {
        $this->unit_lot_type = $unit_lot_type;
    }

    public function getFut_avg_home_price()
    {
        return $this->fut_avg_home_price;
    }

    public function setFut_avg_home_price($fut_avg_home_price)
    {
        $this->fut_avg_home_price = $fut_avg_home_price;
    }

    public function getNo_lots()
    {
        return $this->no_lots;
    }

    public function setNo_lots($no_lots)
    {
        $this->no_lots = $no_lots;
    }

    public function getFut_avg_home_price2()
    {
        return $this->fut_avg_home_price2;
    }

    public function setFut_avg_home_price2($fut_avg_home_price2)
    {
        $this->fut_avg_home_price2 = $fut_avg_home_price2;
    }

    public function getUnadj_sale_price()
    {
        return $this->unadj_sale_price;
    }

    public function setUnadj_sale_price($unadj_sale_price)
    {
        $this->unadj_sale_price = $unadj_sale_price;
    }

    public function getLot_home_price_ratio()
    {
        return $this->lot_home_price_ratio;
    }

    public function setLot_home_price_ratio($lot_home_price_ratio)
    {
        $this->lot_home_price_ratio = $lot_home_price_ratio;
    }

    public function getUnit_density_net_acre()
    {
        return $this->unit_density_net_acre;
    }

    public function setUnit_density_net_acre($unit_density_net_acre)
    {
        $this->unit_density_net_acre = $unit_density_net_acre;
    }

    public function getHard_cost_lot()
    {
        return $this->hard_cost_lot;
    }

    public function setHard_cost_lot($hard_cost_lot)
    {
        $this->hard_cost_lot = $hard_cost_lot;
    }

    public function getOff_site_imp()
    {
        return $this->off_site_imp;
    }

    public function setOff_site_imp($off_site_imp)
    {
        $this->off_site_imp = $off_site_imp;
    }

    public function getFut_finish_size_range()
    {
        return $this->fut_finish_size_range;
    }

    public function setFut_finish_size_range($fut_finish_size_range)
    {
        $this->fut_finish_size_range = $fut_finish_size_range;
    }

    public function getFut_finish_size_avg()
    {
        return $this->fut_finish_size_avg;
    }

    public function setFut_finish_size_avg($fut_finish_size_avg)
    {
        $this->fut_finish_size_avg = $fut_finish_size_avg;
    }

    public function getValue_entitle()
    {
        return $this->value_entitle;
    }

    public function setValue_entitle($value_entitle)
    {
        $this->value_entitle = $value_entitle;
    }

    public function getInc_entitlement()
    {
        return $this->inc_entitlement;
    }

    public function setInc_entitlement($inc_entitlement)
    {
        $this->inc_entitlement = $inc_entitlement;
    }

    public function getValue_entitlement_lot()
    {
        return $this->value_entitlement_lot;
    }

    public function setValue_entitlement_lot($value_entitlement_lot)
    {
        $this->value_entitlement_lot = $value_entitlement_lot;
    }

    public function getSite_amenities()
    {
        return $this->site_amenities;
    }

    public function setSite_amenities($site_amenities)
    {
        $this->site_amenities = $site_amenities;
    }

    public function getProj_fut_avg_finish_price()
    {
        return $this->proj_fut_avg_finish_price;
    }

    public function setProj_fut_avg_finish_price($proj_fut_avg_finish_price)
    {
        $this->proj_fut_avg_finish_price = $proj_fut_avg_finish_price;
    }

    public function getAdj_price_finish_with()
    {
        return $this->adj_price_finish_with;
    }

    public function setAdj_price_finish_with($adj_price_finish_with)
    {
        $this->adj_price_finish_with = $adj_price_finish_with;
    }

    public function getSale_price_lot_with()
    {
        return $this->sale_price_lot_with;
    }

    public function setSale_price_lot_with($sale_price_lot_with)
    {
        $this->sale_price_lot_with = $sale_price_lot_with;
    }

    public function getSale_price_net_acre_with()
    {
        return $this->sale_price_net_acre_with;
    }

    public function setSale_price_net_acre_with($sale_price_net_acre_with)
    {
        $this->sale_price_net_acre_with = $sale_price_net_acre_with;
    }

    public function getPrice_net_sf_with()
    {
        return $this->price_net_sf_with;
    }

    public function setPrice_net_sf_with($price_net_sf_with)
    {
        $this->price_net_sf_with = $price_net_sf_with;
    }

    public function getAdj_price_finished_wo()
    {
        return $this->adj_price_finished_wo;
    }

    public function setAdj_price_finished_wo($adj_price_finished_wo)
    {
        $this->adj_price_finished_wo = $adj_price_finished_wo;
    }

    public function getSale_price_lot_wo()
    {
        return $this->sale_price_lot_wo;
    }

    public function setSale_price_lot_wo($sale_price_lot_wo)
    {
        $this->sale_price_lot_wo = $sale_price_lot_wo;
    }

    public function getSale_price_net_acre_wo()
    {
        return $this->sale_price_net_acre_wo;
    }

    public function setSale_price_net_acre_wo($sale_price_net_acre_wo)
    {
        $this->sale_price_net_acre_wo = $sale_price_net_acre_wo;
    }

    public function getPrice_net_sf_wo()
    {
        return $this->price_net_sf_wo;
    }

    public function setPrice_net_sf_wo($price_net_sf_wo)
    {
        $this->price_net_sf_wo = $price_net_sf_wo;
    }

    public function getInd_lot_nos()
    {
        return $this->ind_lot_nos;
    }

    public function setInd_lot_nos($ind_lot_nos)
    {
        $this->ind_lot_nos = $ind_lot_nos;
    }

    public function getFinish_lot_size_range()
    {
        return $this->finish_lot_size_range;
    }

    public function setFinish_lot_size_range($finish_lot_size_range)
    {
        $this->finish_lot_size_range = $finish_lot_size_range;
    }

    public function getFinish_lot_size_sfba()
    {
        return $this->finish_lot_size_sfba;
    }

    public function setFinish_lot_size_sfba($finish_lot_size_sfba)
    {
        $this->finish_lot_size_sfba = $finish_lot_size_sfba;
    }

    public function getFinish_lot_size_sf()
    {
        return $this->finish_lot_size_sf;
    }

    public function setFinish_lot_size_sf($finish_lot_size_sf)
    {
        $this->finish_lot_size_sf = $finish_lot_size_sf;
    }

    public function getLot_topography()
    {
        return $this->lot_topography;
    }

    public function setLot_topography($lot_topography)
    {
        $this->lot_topography = $lot_topography;
    }

    public function getProject_amenities()
    {
        return $this->project_amenities;
    }

    public function setProject_amenities($project_amenities)
    {
        $this->project_amenities = $project_amenities;
    }

    public function getOriginal_price()
    {
        return $this->original_price;
    }

    public function setOriginal_price($original_price)
    {
        $this->original_price = $original_price;
    }

    public function getOther_lot_comment()
    {
        return $this->other_lot_comment;
    }

    public function setOther_lot_comment($other_lot_comment)
    {
        $this->other_lot_comment = $other_lot_comment;
    }

    public function getAdj_bulk_sale_price()
    {
        return $this->adj_bulk_sale_price;
    }

    public function setAdj_bulk_sale_price($adj_bulk_sale_price)
    {
        $this->adj_bulk_sale_price = $adj_bulk_sale_price;
    }

    public function getBulk_price_lot()
    {
        return $this->bulk_price_lot;
    }

    public function setBulk_price_lot($bulk_price_lot)
    {
        $this->bulk_price_lot = $bulk_price_lot;
    }

    public function getBulk_price_sf_avg()
    {
        return $this->bulk_price_sf_avg;
    }

    public function setBulk_price_sf_avg($bulk_price_sf_avg)
    {
        $this->bulk_price_sf_avg = $bulk_price_sf_avg;
    }

    public function getReport_price_lot()
    {
        return $this->report_price_lot;
    }

    public function setReport_price_lot($report_price_lot)
    {
        $this->report_price_lot = $report_price_lot;
    }

    public function getInd_sale_pct_discount()
    {
        return $this->ind_sale_pct_discount;
    }

    public function setInd_sale_pct_discount($ind_sale_pct_discount)
    {
        $this->ind_sale_pct_discount = $ind_sale_pct_discount;
    }

    public function getAdj_price_acre_gross()
    {
        return $this->adj_price_acre_gross;
    }

    public function setAdj_price_acre_gross($adj_price_acre_gross)
    {
        $this->adj_price_acre_gross = $adj_price_acre_gross;
    }

    public function getAdj_price_acre_net()
    {
        return $this->adj_price_acre_net;
    }

    public function setAdj_price_acre_net($adj_price_acre_net)
    {
        $this->adj_price_acre_net = $adj_price_acre_net;
    }

    public function getAdj_price_sf_pad()
    {
        return $this->adj_price_sf_pad;
    }

    public function setAdj_price_sf_pad($adj_price_sf_pad)
    {
        $this->adj_price_sf_pad = $adj_price_sf_pad;
    }

    public function getAdj_price_sf_gross()
    {
        return $this->adj_price_sf_gross;
    }

    public function setAdj_price_sf_gross($adj_price_sf_gross)
    {
        $this->adj_price_sf_gross = $adj_price_sf_gross;
    }

    public function getAdj_price_sf_net()
    {
        return $this->adj_price_sf_net;
    }

    public function setAdj_price_sf_net($adj_price_sf_net)
    {
        $this->adj_price_sf_net = $adj_price_sf_net;
    }

    public function getAdj_price_sf_far()
    {
        return $this->adj_price_sf_far;
    }

    public function setAdj_price_sf_far($adj_price_sf_far)
    {
        $this->adj_price_sf_far = $adj_price_sf_far;
    }

    public function getAdjhomesite()
    {
        return $this->adjhomesite;
    }

    public function setAdjhomesite($adjhomesite)
    {
        $this->adjhomesite = $adjhomesite;
    }

    public function getSale_comments()
    {
        return $this->sale_comments;
    }

    public function setSale_comments($sale_comments)
    {
        $this->sale_comments = $sale_comments;
    }

    public function getConf_comments()
    {
        return $this->conf_comments;
    }

    public function setConf_comments($conf_comments)
    {
        $this->conf_comments = $conf_comments;
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
    
	public function getWaterrights() {
		return $this->waterrights;
	}

	public function setWaterrights( $waterrights ) {
		$this->waterrights = $waterrights;
	}  
	
	public function getIrigwell() {
		return $this->irigwell;
	}

	public function setIrigwell( $irigwell ) {
		$this->irigwell = $irigwell;
	}  
	
	public function getDwellrights() {
		return $this->dwellrights;
	}

	public function setDwellrights( $dwellrights ) {
		$this->dwellrights = $dwellrights;
	}  
	
	public function getHomesite() {
		return $this->homesite;
	}

	public function setHomesite( $homesite ) {
		$this->homesite = $homesite;
	}
    
    public function getNohomesite()
    {
        if(!isset($this->nohomesite)){
            return 1;
        }
        return intval($this->nohomesite);
    }

    public function setNohomesite($nohomesite)
    {
        $this->nohomesite = $nohomesite;
    }
}
?>