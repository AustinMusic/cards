<?php
class appraisals {
  public $id;
  public $status;
  public $priority;
  public $AssignedTo;
  public $DueDate;
  public $OwnerID;
  public $reportname;
  public $boxurl;
  public $DateCreated;
  public $CreatedBy;
  public $DateModified;
  public $ModifiedBy;
  public $FileOrigin;
  public $clonelink;
  public $job_no;
  public $bid_fee;
  public $appraisal_type;
  public $purpose_of_appraisal;
  public $client_name;
  public $client_reference_no;
  public $borrower;
  public $no_copies;
  public $estate_appraised;
  public $prosstab_est_app;
  public $proscomp_est_app;
  public $as_is;
  public $prospective_stabilized;
  public $prospective_completion;
  public $retrospective;
  public $eff_date_value;
  public $prosstab_dov;
  public $proscomp_dov;
  public $retro_dov;
  public $inspect_date;
  public $site_valuation;
  public $cost_approach;
  public $income_approach;
  public $groundlease;
  public $sales_comparison;
  public $ownaddress;
  public $owncity;
  public $ownstate;
  public $ownzipcode;
  public $rowprojname;
  public $reqinsdate;
  public $rowdold;
  public $rowsfacq;
  public $rowappfirm;
  public $rowappname;
  public $rowdoreport;
  public $rowdoreview;
  public $special_comments;
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
  public $legal_desc;
  public $propertytype;
  public $propertysubtype;
  public $owner_type;
  public $owner_name;
  public $msa;
  public $genmarket;
  public $submarkid;
  public $appraiserone;
  public $appraisertwo;
  public $appasstone;
  public $appassttwo;
  public $client_db;
  public $list_price;
  public $record_date;
  public $sale_status;
  public $sale_comments;
  public $grantor;
  public $grantee;
  public $gla_inputtype;
  public $gla_inputsize;
  public $gross_land_sf;
  public $gross_land_acre;
  public $unusable_sf;
  public $unusable_acre;
  public $unusable_desc;
  public $net_usable_sf;
  public $net_usable_acre;
  public $net_usable_desc;
  public $surplus_sf;
  public $surplus_acre;
  public $surplus_desc;
  public $excess_sf;
  public $excess_acre;
  public $excess_desc;
  public $primary_sf;
  public $primary_acre;
  public $shape;
  public $utilities;
  public $exposure;
  public $flood_plain;
  public $topography;
  public $site_access;
  public $orientation;
  public $easement;
  public $easement_desc;
  public $zoning_code;
  public $zoning_desc;
  public $zoning_overlay;
  public $zoning_overlay_desc;
  public $zoning_juris;
  public $zoning_details;
  public $max_building_ht;
  public $floor_area_ratio;
  public $max_floor_area;
  public $traffic_count;
  public $traffic_date;
  public $inter_street;
  public $assessedyear;
  public $no_building;
  public $no_stories;
  public $floor_1_gba;
  public $floor_2_gba;
  public $total_basement_gba;
  public $overall_gba;
  public $basement_pct_gba;
  public $gba_source;
  public $floor_1_nra;
  public $floor_2_nra;
  public $total_basement_nra;
  public $overall_nra;
  public $basement_pct_nra;
  public $nra_source;
  public $eff_ratio_pct_nra;
  public $land_build_ratio_primary;
  public $site_cover_primary;
  public $land_build_ratio_overall;
  public $site_cover_overall;
  public $basement_type;
  public $storage_basement_sf;
  public $ancillary_area_sf;
  public $ancillary_area_desc;
  public $parking_stalls;
  public $parking_ratio_gba;
  public $parking_ratio_nra;
  public $parking_ratio_unit;
  public $parking_type;
  public $parking_ratio;
  public $building_comments;
  public $year_built;
  public $year_built_search;
  public $last_renovation;
  public $no_units;
  public $no_tenants;
  public $occupancy_type;
  public $building_quality;
  public $building_class;
  public $int_condition;
  public $ext_condition;
  public $const_class;
  public $const_descr;
  public $other_const_features;
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
  public $imptemp;
  public $caprate_db;
  public $improved_db;
  public $impwordtemplate;
  public $daitemplate;
  public $daltemplate;
  public $dartemplate;
  public $adddartemplate;
  public $impexceltemplate;
  public $landtemp;
  public $land_db;
  public $landwordtemplate;
  public $landexceltemplate;
  public $leasetemp;
  public $lease_db;
  public $leasewordtemplate;
  public $addrentwordtemp;
  public $leaseexceltemplate;
  public $addrentextemp;
  public $miscrent_db;
  public $xtrarents;
  public $otrenttemplate;
  public $assessedvalues;  
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

  public function getId() {
    if ( !isset( $this->id ) ) {
      return 0;
    }
    return intval( $this->id );
  }

  public function setId( $id ) {
    $this->id = $id;
  }

  public function getStatus() {
    return $this->status;
  }

  public function setStatus( $status ) {
    $this->status = $status;
  }

  public function getPriority() {
    return $this->priority;
  }

  public function setPriority( $priority ) {
    $this->priority = $priority;
  }

  public function getAssignedTo() {
    return $this->AssignedTo;
  }

  public function setAssignedTo( $AssignedTo ) {
    $this->AssignedTo = $AssignedTo;
  }

  public function getDueDate() {
    return $this->DueDate;
  }

  public function setDueDate( $DueDate ) {
    $this->DueDate = $DueDate;
  }

  public function getOwnerID() {
    return $this->OwnerID;
  }

  public function setOwnerID( $OwnerID ) {
    $this->OwnerID = $OwnerID;
  }

  public function getReportname() {
    return $this->reportname;
  }

  public function setReportname( $reportname ) {
    $this->reportname = $reportname;
  }

  public function getBoxurl() {
/*    $this->boxurl = str_replace( "\t", "", $this->boxurl );
    $this->boxurl = str_replace( "\n", "", $this->boxurl );
    $this->boxurl = str_replace( "\r", "", $this->boxurl );
    $this->boxurl = str_replace( " ", "", $this->boxurl );*/

    return $this->boxurl;
  }

  public function setBoxurl( $boxurl ) {
    $this->boxurl = $boxurl;
  }

  public function getDateCreated() {
    return $this->DateCreated;
  }

  public function setDateCreated( $DateCreated ) {
    $this->DateCreated = $DateCreated;
  }

  public function getCreatedBy() {
    return $this->CreatedBy;
  }

  public function setCreatedBy( $CreatedBy ) {
    $this->CreatedBy = $CreatedBy;
  }

  public function getDateModified() {
    return $this->DateModified;
  }

  public function setDateModified( $DateModified ) {
    $this->DateModified = $DateModified;
  }

  public function getModifiedBy() {
    return $this->ModifiedBy;
  }

  public function setModifiedBy( $ModifiedBy ) {
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

  public function getJob_no() {
    return $this->job_no;
  }

  public function setJob_no( $job_no ) {
    $this->job_no = $job_no;
  }

  public function getBid_fee() {
    return $this->bid_fee;
  }

  public function setBid_fee( $bid_fee ) {
    $this->bid_fee = $bid_fee;
  }

  public function getAppraisal_type() {
    return $this->appraisal_type;
  }

  public function setAppraisal_type( $appraisal_type ) {
    $this->appraisal_type = $appraisal_type;
  }

  public function getPurpose_of_appraisal() {
    return $this->purpose_of_appraisal;
  }

  public function setPurpose_of_appraisal( $purpose_of_appraisal ) {
    $this->purpose_of_appraisal = $purpose_of_appraisal;
  }

  public function getClient_name() {
    return $this->client_name;
  }

  public function setClient_name( $client_name ) {
    $this->client_name = $client_name;
  }

  public function getClient_reference_no() {
    return $this->client_reference_no;
  }

  public function setClient_reference_no( $client_reference_no ) {
    $this->client_reference_no = $client_reference_no;
  }

  public function getBorrower() {
    return $this->borrower;
  }

  public function setBorrower( $borrower ) {
    $this->borrower = $borrower;
  }

  public function getEstate_appraised() {
    return $this->estate_appraised;
  }

  public function setEstate_appraised( $estate_appraised ) {
    $this->estate_appraised = $estate_appraised;
  }


  public function getProsstab_est_app() {
    return $this->prosstab_est_app;
  }

  public function setProsstab_est_app( $prosstab_est_app ) {
    $this->prosstab_est_app = $prosstab_est_app;
  }

  public function getProscomp_est_app() {
    return $this->proscomp_est_app;
  }

  public function setProscomp_est_app( $proscomp_est_app ) {
    $this->proscomp_est_app = $proscomp_est_app;
  }

  public function getAs_is() {
    if ( !isset( $this->as_is ) ) {
      return 0;
    }
    return intval( $this->as_is );
  }

  public function setAs_is( $as_is ) {
    $this->as_is = $as_is;
  }

  public function getRetrospective() {
    if ( !isset( $this->retrospective ) ) {
      return 0;
    }
    return intval( $this->retrospective );
  }

  public function setRetrospective( $retrospective ) {
    $this->retrospective = $retrospective;
  }

  public function getProspective_stabilized() {
    if ( !isset( $this->prospective_stabilized ) ) {
      return 0;
    }
    return intval( $this->prospective_stabilized );
  }

  public function setProspective_stabilized( $prospective_stabilized ) {
    $this->prospective_stabilized = $prospective_stabilized;
  }

  public function getProspective_completion() {
    if ( !isset( $this->prospective_completion ) ) {
      return 0;
    }
    return intval( $this->prospective_completion );
  }

  public function setProspective_completion( $prospective_completion ) {
    $this->prospective_completion = $prospective_completion;
  }

  public function getEff_date_value() {
    return $this->eff_date_value;
  }

  public function setEff_date_value( $eff_date_value ) {
    $this->eff_date_value = $eff_date_value;
  }

  public function getProsstab_dov() {
    return $this->prosstab_dov;
  }

  public function setProsstab_dov( $prosstab_dov ) {
    $this->prosstab_dov = $prosstab_dov;
  }

  public function getProscomp_dov() {
    return $this->proscomp_dov;
  }

  public function setProscomp_dov( $proscomp_dov ) {
    $this->proscomp_dov = $proscomp_dov;
  }

  public function getRetro_dov() {
    return $this->retro_dov;
  }

  public function setRetro_dov( $retro_dov ) {
    $this->retro_dov = $retro_dov;
  }

  public function getInspect_date() {
    return $this->inspect_date;
  }

  public function setInspect_date( $inspect_date ) {
    $this->inspect_date = $inspect_date;
  }

  public function getSite_valuation() {
    if ( !isset( $this->site_valuation ) ) {
      return 0;
    }
    return intval( $this->site_valuation );
  }

  public function setSite_valuation( $site_valuation ) {
    $this->site_valuation = $site_valuation;
  }

  public function getCost_approach() {
    if ( !isset( $this->cost_approach ) ) {
      return 0;
    }
    return intval( $this->cost_approach );
  }

  public function setCost_approach( $cost_approach ) {
    $this->cost_approach = $cost_approach;
  }

  public function getIncome_approach() {
    if ( !isset( $this->income_approach ) ) {
      return 0;
    }
    return intval( $this->income_approach );
  }

  public function setIncome_approach( $income_approach ) {
    $this->income_approach = $income_approach;
  }

  public function getGroundlease() {
    if ( !isset( $this->groundlease ) ) {
      return 0;
    }
    return intval( $this->groundlease );
  }

  public function setGroundlease( $groundlease ) {
    $this->groundlease = $groundlease;
  }

  public function getSales_comparison() {
    if ( !isset( $this->sales_comparison ) ) {
      return 0;
    }
    return intval( $this->sales_comparison );
  }

  public function setSales_comparison( $sales_comparison ) {
    $this->sales_comparison = $sales_comparison;
  }

  public function getOwnaddress() {
    return $this->ownaddress;
  }

  public function setOwnaddress( $ownaddress ) {
    $this->ownaddress = $ownaddress;
  }

  public function getOwncity() {
    return $this->owncity;
  }

  public function setOwncity( $owncity ) {
    $this->owncity = $owncity;
  }

  public function getOwnstate() {
    return $this->ownstate;
  }

  public function setOwnstate( $ownstate ) {
    $this->ownstate = $ownstate;
  }

  public function getOwnzipcode() {
    return $this->ownzipcode;
  }

  public function setOwnzipcode( $ownzipcode ) {
    $this->ownzipcode = $ownzipcode;
  }

  public function getRowprojname() {
    return $this->rowprojname;
  }

  public function setRowprojname( $rowprojname ) {
    $this->rowprojname = $rowprojname;
  }

  public function getReqinsdate() {
    return $this->reqinsdate;
  }

  public function setReqinsdate( $reqinsdate ) {
    $this->reqinsdate = $reqinsdate;
  }

  public function getRowdold() {
    return $this->rowdold;
  }

  public function setRowdold( $rowdold ) {
    $this->rowdold = $rowdold;
  }

  public function getRowsfacq() {
    return $this->rowsfacq;
  }

  public function setRowsfacq( $rowsfacq ) {
    $this->rowsfacq = $rowsfacq;
  }

  public function getRowappfirm() {
    return $this->rowappfirm;
  }

  public function setRowappfirm( $rowappfirm ) {
    $this->rowappfirm = $rowappfirm;
  }

  public function getRowappname() {
    return $this->rowappname;
  }

  public function setRowappname( $rowappname ) {
    $this->rowappname = $rowappname;
  }

  public function getRowdoreport() {
    return $this->rowdoreport;
  }

  public function setRowdoreport( $rowdoreport ) {
    $this->rowdoreport = $rowdoreport;
  }

  public function getRowdoreview() {
    return $this->rowdoreview;
  }

  public function setRowdoreview( $rowdoreview ) {
    $this->rowdoreview = $rowdoreview;
  }

  public function getSpecial_comments() {
    return $this->special_comments;
  }

  public function setSpecial_comments( $special_comments ) {
    $this->special_comments = $special_comments;
  }

  public function getPhoto1() {
    return $this->photo1;
  }

  public function setPhoto1( $photo1 ) {
    $this->photo1 = $photo1;
  }

  public function getImage() {
    return $this->image;
  }

  public function setImage( $image ) {
    $this->image = $image;
  }

  public function getThumbnail() {
    return $this->thumbnail;
  }

  public function setThumbnail( $thumbnail ) {
    $this->thumbnail = $thumbnail;
  }

  public function getProperty_name() {
    return $this->property_name;
  }

  public function setProperty_name( $property_name ) {
    $this->property_name = $property_name;
  }

  public function getAddress() {
    return $this->address;
  }

  public function setAddress( $address ) {
    $this->address = $address;
  }

  public function getStreetnumber() {
    return $this->streetnumber;
  }

  public function setStreetnumber( $streetnumber ) {
    $this->streetnumber = $streetnumber;
  }

  public function getStreetname() {
    return $this->streetname;
  }

  public function setStreetname( $streetname ) {
    $this->streetname = $streetname;
  }

  public function getCity() {
    return $this->city;
  }

  public function setCity( $city ) {
    $this->city = $city;
  }

  public function getCounty() {
    return $this->county;
  }

  public function setCounty( $county ) {
    $this->county = $county;
  }

  public function getState() {
    return $this->state;
  }

  public function setState( $state ) {
    $this->state = $state;
  }

  public function getZip_code() {
    return $this->zip_code;
  }

  public function setZip_code( $zip_code ) {
    $this->zip_code = $zip_code;
  }

  public function getLat() {
    return $this->lat;
  }

  public function setLat( $lat ) {
    $this->lat = $lat;
  }

  public function getLng() {
    return $this->lng;
  }

  public function setLng( $lng ) {
    $this->lng = $lng;
  }

  public function getLegal_desc() {
    return $this->legal_desc;
  }

  public function setLegal_desc( $legal_desc ) {
    $this->legal_desc = $legal_desc;
  }

  public function getPropertytype() {
    if ( !isset( $this->propertytype ) ) {
      return 20;
    }
    return intval( $this->propertytype );
  }

  public function setPropertytype( $propertytype ) {
    $this->propertytype = $propertytype;
  }

  public function getPropertysubtype() {
    return $this->propertysubtype;
  }

  public function setPropertysubtype( $propertysubtype ) {
    $this->propertysubtype = $propertysubtype;
  }

  public function getOwner_type() {
    return $this->owner_type;
  }

  public function setOwner_type( $owner_type ) {
    $this->owner_type = $owner_type;
  }

  public function getOwner_name() {
    return $this->owner_name;
  }

  public function setOwner_name( $owner_name ) {
    $this->owner_name = $owner_name;
  }

  public function getMsa() {
    return $this->msa;
  }

  public function setMsa( $msa ) {
    $this->msa = $msa;
  }

  public function getGenmarket() {
    return $this->genmarket;
  }

  public function setGenmarket( $genmarket ) {
    $this->genmarket = $genmarket;
  }

  public function getSubmarkid() {
    return $this->submarkid;
  }

  public function setSubmarkid( $submarkid ) {
    $this->submarkid = $submarkid;
  }
  public function getAppraiserone() {
    return $this->appraiserone;
  }

  public function setAppraiserone( $appraiserone ) {
    $this->appraiserone = $appraiserone;
  }
	
  public function getAppraisertwo() {
    return $this->appraisertwo;
  }

  public function setAppraisertwo( $appraisertwo ) {
    $this->appraisertwo = $appraisertwo;
  }

  public function getAppasstone() {
    return $this->appasstone;
  }

  public function setAppasstone( $appasstone ) {
    $this->appasstone = $appasstone;
  }

  public function getAppassttwo() {
    return $this->appassttwo;
  }

  public function setAppassttwo( $appassttwo ) {
    $this->appassttwo = $appassttwo;
  }

  public function getClient_db() {
    return $this->client_db;
  }

  public function setClient_db( $client_db ) {
    $this->client_db = $client_db;
  }

  public function getList_price() {
    return $this->list_price;
  }

  public function setList_price( $list_price ) {
    $this->list_price = $list_price;
  }

  public function getRecord_date() {
    return $this->record_date;
  }

  public function setRecord_date( $record_date ) {
    $this->record_date = $record_date;
  }

  public function getSale_status() {
    return $this->sale_status;
  }

  public function setSale_status( $sale_status ) {
    $this->sale_status = $sale_status;
  }

  public function getSale_comments() {
    return $this->sale_comments;
  }

  public function setSale_comments( $sale_comments ) {
    $this->sale_comments = $sale_comments;
  }

  public function getGrantor() {
    return $this->grantor;
  }

  public function setGrantor( $grantor ) {
    $this->grantor = $grantor;
  }

  public function getGrantee() {
    return $this->grantee;
  }

  public function setGrantee( $grantee ) {
    $this->grantee = $grantee;
  }
  public function getGla_inputtype() {
    if ( !isset( $this->gla_inputtype ) ) {
      return 0;
    }
    return intval( $this->gla_inputtype );
  }

  public function setGla_inputtype( $gla_inputtype ) {
    $this->gla_inputtype = $gla_inputtype;
  }

  public function getGla_inputsize() {
    return $this->gla_inputsize;
  }

  public function setGla_inputsize( $gla_inputsize ) {
    $this->gla_inputsize = $gla_inputsize;
  }

  public function getGross_land_sf() {
    return $this->gross_land_sf;
  }

  public function setGross_land_sf( $gross_land_sf ) {
    $this->gross_land_sf = $gross_land_sf;
  }

  public function getGross_land_acre() {
    return $this->gross_land_acre;
  }

  public function setGross_land_acre( $gross_land_acre ) {
    $this->gross_land_acre = $gross_land_acre;
  }

  public function getUnusable_sf() {
    return $this->unusable_sf;
  }

  public function setUnusable_sf( $unusable_sf ) {
    $this->unusable_sf = $unusable_sf;
  }

  public function getUnusable_acre() {
    return $this->unusable_acre;
  }

  public function setUnusable_acre( $unusable_acre ) {
    $this->unusable_acre = $unusable_acre;
  }

  public function getUnusable_desc() {
    return $this->unusable_desc;
  }

  public function setUnusable_desc( $unusable_desc ) {
    $this->unusable_desc = $unusable_desc;
  }

  public function getNet_usable_sf() {
    return $this->net_usable_sf;
  }

  public function setNet_usable_sf( $net_usable_sf ) {
    $this->net_usable_sf = $net_usable_sf;
  }

  public function getNet_usable_acre() {
    return $this->net_usable_acre;
  }

  public function setNet_usable_acre( $net_usable_acre ) {
    $this->net_usable_acre = $net_usable_acre;
  }

  public function getNet_usable_desc() {
    return $this->net_usable_desc;
  }

  public function setNet_usable_desc( $net_usable_desc ) {
    $this->net_usable_desc = $net_usable_desc;
  }

  public function getSurplus_sf() {
    return $this->surplus_sf;
  }

  public function setSurplus_sf( $surplus_sf ) {
    $this->surplus_sf = $surplus_sf;
  }

  public function getSurplus_acre() {
    return $this->surplus_acre;
  }

  public function setSurplus_acre( $surplus_acre ) {
    $this->surplus_acre = $surplus_acre;
  }

  public function getSurplus_desc() {
    return $this->surplus_desc;
  }

  public function setSurplus_desc( $surplus_desc ) {
    $this->surplus_desc = $surplus_desc;
  }

  public function getExcess_sf() {
    return $this->excess_sf;
  }

  public function setExcess_sf( $excess_sf ) {
    $this->excess_sf = $excess_sf;
  }

  public function getExcess_acre() {
    return $this->excess_acre;
  }

  public function setExcess_acre( $excess_acre ) {
    $this->excess_acre = $excess_acre;
  }

  public function getExcess_desc() {
    return $this->excess_desc;
  }

  public function setExcess_desc( $excess_desc ) {
    $this->excess_desc = $excess_desc;
  }

  public function getPrimary_sf() {
    return $this->primary_sf;
  }

  public function setPrimary_sf( $primary_sf ) {
    $this->primary_sf = $primary_sf;
  }

  public function getPrimary_acre() {
    return $this->primary_acre;
  }

  public function setPrimary_acre( $primary_acre ) {
    $this->primary_acre = $primary_acre;
  }

  public function getShape() {
    return $this->shape;
  }

  public function setShape( $shape ) {
    $this->shape = $shape;
  }

  public function getUtilities() {
    return $this->utilities;
  }

  public function setUtilities( $utilities ) {
    $this->utilities = $utilities;
  }

  public function getExposure() {
    return $this->exposure;
  }

  public function setExposure( $exposure ) {
    $this->exposure = $exposure;
  }

  public function getFlood_plain() {
    return $this->flood_plain;
  }

  public function setFlood_plain( $flood_plain ) {
    $this->flood_plain = $flood_plain;
  }

  public function getTopography() {
    return $this->topography;
  }

  public function setTopography( $topography ) {
    $this->topography = $topography;
  }

  public function getSite_access() {
    return $this->site_access;
  }

  public function setSite_access( $site_access ) {
    $this->site_access = $site_access;
  }

  public function getOrientation() {
    return $this->orientation;
  }

  public function setOrientation( $orientation ) {
    $this->orientation = $orientation;
  }

  public function getEasement() {
    return $this->easement;
  }

  public function setEasement( $easement ) {
    $this->easement = $easement;
  }

  public function getEasement_desc() {
    return $this->easement_desc;
  }

  public function setEasement_desc( $easement_desc ) {
    $this->easement_desc = $easement_desc;
  }

  public function getZoning_code() {
    return $this->zoning_code;
  }

  public function setZoning_code( $zoning_code ) {
    $this->zoning_code = $zoning_code;
  }

  public function getZoning_desc() {
    return $this->zoning_desc;
  }

  public function setZoning_desc( $zoning_desc ) {
    $this->zoning_desc = $zoning_desc;
  }

  public function getZoning_overlay() {
    return $this->zoning_overlay;
  }

  public function setZoning_overlay( $zoning_overlay ) {
    $this->zoning_overlay = $zoning_overlay;
  }

  public function getZoning_overlay_desc() {
    return $this->zoning_overlay_desc;
  }

  public function setZoning_overlay_desc( $zoning_overlay_desc ) {
    $this->zoning_overlay_desc = $zoning_overlay_desc;
  }

  public function getZoning_juris() {
    return $this->zoning_juris;
  }

  public function setZoning_juris( $zoning_juris ) {
    $this->zoning_juris = $zoning_juris;
  }

  public function getZoning_details() {
    return $this->zoning_details;
  }

  public function setZoning_details( $zoning_details ) {
    $this->zoning_details = $zoning_details;
  }

  public function getMax_building_ht() {
    return $this->max_building_ht;
  }

  public function setMax_building_ht( $max_building_ht ) {
    $this->max_building_ht = $max_building_ht;
  }

  public function getFloor_area_ratio() {
    return $this->floor_area_ratio;
  }

  public function setFloor_area_ratio( $floor_area_ratio ) {
    $this->floor_area_ratio = $floor_area_ratio;
  }

  public function getMax_floor_area() {
    return $this->max_floor_area;
  }

  public function setMax_floor_area( $max_floor_area ) {
    $this->max_floor_area = $max_floor_area;
  }

  public function getTraffic_count() {
    return $this->traffic_count;
  }

  public function setTraffic_count( $traffic_count ) {
    $this->traffic_count = $traffic_count;
  }

  public function getTraffic_date() {
    return $this->traffic_date;
  }

  public function setTraffic_date( $traffic_date ) {
    $this->traffic_date = $traffic_date;
  }

  public function getInter_street() {
    return $this->inter_street;
  }

  public function setInter_street( $inter_street ) {
    $this->inter_street = $inter_street;
  }

  public function getAssessedyear() {
    return $this->assessedyear;
  }

  public function setAssessedyear( $assessedyear ) {
    $this->assessedyear = $assessedyear;
  }

  public function getNo_building() {
    return $this->no_building;
  }

  public function setNo_building( $no_building ) {
    $this->no_building = $no_building;
  }

  public function getNo_stories() {
    return $this->no_stories;
  }

  public function setNo_stories( $no_stories ) {
    $this->no_stories = $no_stories;
  }

  public function getFloor_1_gba() {
    return $this->floor_1_gba;
  }

  public function setFloor_1_gba( $floor_1_gba ) {
    $this->floor_1_gba = $floor_1_gba;
  }

  public function getFloor_2_gba() {
    return $this->floor_2_gba;
  }

  public function setFloor_2_gba( $floor_2_gba ) {
    $this->floor_2_gba = $floor_2_gba;
  }

  public function getTotal_basement_gba() {
    return $this->total_basement_gba;
  }

  public function setTotal_basement_gba( $total_basement_gba ) {
    $this->total_basement_gba = $total_basement_gba;
  }

  public function getOverall_gba() {
    return $this->overall_gba;
  }

  public function setOverall_gba( $overall_gba ) {
    $this->overall_gba = $overall_gba;
  }

  public function getBasement_pct_gba() {
    return $this->basement_pct_gba;
  }

  public function setBasement_pct_gba( $basement_pct_gba ) {
    $this->basement_pct_gba = $basement_pct_gba;
  }

  public function getGba_source() {
    return $this->gba_source;
  }

  public function setGba_source( $gba_source ) {
    $this->gba_source = $gba_source;
  }

  public function getFloor_1_nra() {
    return $this->floor_1_nra;
  }

  public function setFloor_1_nra( $floor_1_nra ) {
    $this->floor_1_nra = $floor_1_nra;
  }

  public function getFloor_2_nra() {
    return $this->floor_2_nra;
  }

  public function setFloor_2_nra( $floor_2_nra ) {
    $this->floor_2_nra = $floor_2_nra;
  }

  public function getTotal_basement_nra() {
    return $this->total_basement_nra;
  }

  public function setTotal_basement_nra( $total_basement_nra ) {
    $this->total_basement_nra = $total_basement_nra;
  }

  public function getOverall_nra() {
    return $this->overall_nra;
  }

  public function setOverall_nra( $overall_nra ) {
    $this->overall_nra = $overall_nra;
  }

  public function getBasement_pct_nra() {
    return $this->basement_pct_nra;
  }

  public function setBasement_pct_nra( $basement_pct_nra ) {
    $this->basement_pct_nra = $basement_pct_nra;
  }

  public function getNra_source() {
    return $this->nra_source;
  }

  public function setNra_source( $nra_source ) {
    $this->nra_source = $nra_source;
  }

  public function getEff_ratio_pct_nra() {
    return $this->eff_ratio_pct_nra;
  }

  public function setEff_ratio_pct_nra( $eff_ratio_pct_nra ) {
    $this->eff_ratio_pct_nra = $eff_ratio_pct_nra;
  }

  public function getLand_build_ratio_primary() {
    return $this->land_build_ratio_primary;
  }

  public function setLand_build_ratio_primary( $land_build_ratio_primary ) {
    $this->land_build_ratio_primary = $land_build_ratio_primary;
  }

  public function getSite_cover_primary() {
    return $this->site_cover_primary;
  }

  public function setSite_cover_primary( $site_cover_primary ) {
    $this->site_cover_primary = $site_cover_primary;
  }

  public function getLand_build_ratio_overall() {
    return $this->land_build_ratio_overall;
  }

  public function setLand_build_ratio_overall( $land_build_ratio_overall ) {
    $this->land_build_ratio_overall = $land_build_ratio_overall;
  }

  public function getSite_cover_overall() {
    return $this->site_cover_overall;
  }

  public function setSite_cover_overall( $site_cover_overall ) {
    $this->site_cover_overall = $site_cover_overall;
  }

  public function getBasement_type() {
    return $this->basement_type;
  }

  public function setBasement_type( $basement_type ) {
    $this->basement_type = $basement_type;
  }

  public function getStorage_basement_sf() {
    return $this->storage_basement_sf;
  }

  public function setStorage_basement_sf( $storage_basement_sf ) {
    $this->storage_basement_sf = $storage_basement_sf;
  }

  public function getAncillary_area_sf() {
    return $this->ancillary_area_sf;
  }

  public function setAncillary_area_sf( $ancillary_area_sf ) {
    $this->ancillary_area_sf = $ancillary_area_sf;
  }

  public function getAncillary_area_desc() {
    return $this->ancillary_area_desc;
  }

  public function setAncillary_area_desc( $ancillary_area_desc ) {
    $this->ancillary_area_desc = $ancillary_area_desc;
  }
  public function getParking_stalls() {
    if ( !isset( $this->parking_stalls ) ) {
      return 0;
    }
    return $this->parking_stalls;
  }

  public function setParking_stalls( $parking_stalls ) {
    $this->parking_stalls = $parking_stalls;
  }

  public function getParking_ratio_gba() {
    if ( !isset( $this->parking_ratio_gba ) ) {
      return 0;
    }
    return $this->parking_ratio_gba;
  }

  public function setParking_ratio_gba( $parking_ratio_gba ) {
    $this->parking_ratio_gba = $parking_ratio_gba;
  }

  public function getParking_ratio_nra() {
    if ( !isset( $this->parking_ratio_nra ) ) {
      return 0;
    }
    return $this->parking_ratio_nra;
  }

  public function setParking_ratio_nra( $parking_ratio_nra ) {
    $this->parking_ratio_nra = $parking_ratio_nra;
  }
  public function getParking_ratio_unit() {
    if ( !isset( $this->parking_ratio_unit ) ) {
      return 0;
    }
    return $this->parking_ratio_unit;
  }

  public function setParking_ratio_unit( $parking_ratio_unit ) {
    $this->parking_ratio_unit = $parking_ratio_unit;
  }

  public function getParking_type() {
    return $this->parking_type;
  }

  public function setParking_type( $parking_type ) {
    $this->parking_type = $parking_type;
  }

  public function getParking_ratio() {
    return $this->parking_ratio;
  }

  public function setParking_ratio( $parking_ratio ) {
    $this->parking_ratio = $parking_ratio;
  }

  public function getBuilding_comments() {
    return $this->building_comments;
  }

  public function setBuilding_comments( $building_comments ) {
    $this->building_comments = $building_comments;
  }

  public function getYear_built() {
    return $this->year_built;
  }

  public function setYear_built( $year_built ) {
    $this->year_built = $year_built;
  }

  public function getYear_built_search() {
    return $this->year_built_search;
  }

  public function setYear_built_search( $year_built_search ) {
    $this->year_built_search = $year_built_search;
  }

  public function getLast_renovation() {
    return $this->last_renovation;
  }

  public function setLast_renovation( $last_renovation ) {
    $this->last_renovation = $last_renovation;
  }

  public function getNo_units() {
    return $this->no_units;
  }

  public function setNo_units( $no_units ) {
    $this->no_units = $no_units;
  }

  public function getNo_tenants() {
    return $this->no_tenants;
  }

  public function setNo_tenants( $no_tenants ) {
    $this->no_tenants = $no_tenants;
  }

  public function getOccupancy_type() {
    return $this->occupancy_type;
  }

  public function setOccupancy_type( $occupancy_type ) {
    $this->occupancy_type = $occupancy_type;
  }

  public function getBuilding_quality() {
    return $this->building_quality;
  }

  public function setBuilding_quality( $building_quality ) {
    $this->building_quality = $building_quality;
  }

  public function getBuilding_class() {
    return $this->building_class;
  }

  public function setBuilding_class( $building_class ) {
    $this->building_class = $building_class;
  }

  public function getInt_condition() {
    return $this->int_condition;
  }

  public function setInt_condition( $int_condition ) {
    $this->int_condition = $int_condition;
  }

  public function getExt_condition() {
    return $this->ext_condition;
  }

  public function setExt_condition( $ext_condition ) {
    $this->ext_condition = $ext_condition;
  }

  public function getConst_class() {
    return $this->const_class;
  }

  public function setConst_class( $const_class ) {
    $this->const_class = $const_class;
  }

  public function getConst_descr() {
    return $this->const_descr;
  }

  public function setConst_descr( $const_descr ) {
    $this->const_descr = $const_descr;
  }

  public function getOther_const_features() {
    return $this->other_const_features;
  }

  public function setOther_const_features( $other_const_features ) {
    $this->other_const_features = $other_const_features;
  }

  public function getInd_clear_height() {
    return $this->ind_clear_height;
  }

  public function setInd_clear_height( $ind_clear_height ) {
    $this->ind_clear_height = $ind_clear_height;
  }

  public function getInd_ext_office_1() {
    return $this->ind_ext_office_1;
  }

  public function setInd_ext_office_1( $ind_ext_office_1 ) {
    $this->ind_ext_office_1 = $ind_ext_office_1;
  }

  public function getInd_ext_office_2() {
    return $this->ind_ext_office_2;
  }

  public function setInd_ext_office_2( $ind_ext_office_2 ) {
    $this->ind_ext_office_2 = $ind_ext_office_2;
  }

  public function getInd_fire() {
    return $this->ind_fire;
  }

  public function setInd_fire( $ind_fire ) {
    $this->ind_fire = $ind_fire;
  }

  public function getInd_hvac() {
    return $this->ind_hvac;
  }

  public function setInd_hvac( $ind_hvac ) {
    $this->ind_hvac = $ind_hvac;
  }

  public function getInd_int_office_1() {
    return $this->ind_int_office_1;
  }

  public function setInd_int_office_1( $ind_int_office_1 ) {
    $this->ind_int_office_1 = $ind_int_office_1;
  }

  public function getInd_int_office_2() {
    return $this->ind_int_office_2;
  }

  public function setInd_int_office_2( $ind_int_office_2 ) {
    $this->ind_int_office_2 = $ind_int_office_2;
  }

  public function getInd_mezz_desc() {
    return $this->ind_mezz_desc;
  }

  public function setInd_mezz_desc( $ind_mezz_desc ) {
    $this->ind_mezz_desc = $ind_mezz_desc;
  }

  public function getInd_no_rail() {
    return $this->ind_no_rail;
  }

  public function setInd_no_rail( $ind_no_rail ) {
    $this->ind_no_rail = $ind_no_rail;
  }

  public function getInd_pct_office() {
    return $this->ind_pct_office;
  }

  public function setInd_pct_office( $ind_pct_office ) {
    $this->ind_pct_office = $ind_pct_office;
  }

  public function getInd_rail() {
    return $this->ind_rail;
  }

  public function setInd_rail( $ind_rail ) {
    $this->ind_rail = $ind_rail;
  }

  public function getInd_storage_mess() {
    return $this->ind_storage_mess;
  }

  public function setInd_storage_mess( $ind_storage_mess ) {
    $this->ind_storage_mess = $ind_storage_mess;
  }

  public function getInd_storage_mezz_sf() {
    return $this->ind_storage_mezz_sf;
  }

  public function setInd_storage_mezz_sf( $ind_storage_mezz_sf ) {
    $this->ind_storage_mezz_sf = $ind_storage_mezz_sf;
  }

  public function getInd_total_office() {
    return $this->ind_total_office;
  }

  public function setInd_total_office( $ind_total_office ) {
    $this->ind_total_office = $ind_total_office;
  }

  public function getInd_truck_dock() {
    return $this->ind_truck_dock;
  }

  public function setInd_truck_dock( $ind_truck_dock ) {
    $this->ind_truck_dock = $ind_truck_dock;
  }

  public function getInd_truck_grade() {
    return $this->ind_truck_grade;
  }

  public function setInd_truck_grade( $ind_truck_grade ) {
    $this->ind_truck_grade = $ind_truck_grade;
  }

  public function getOff_elevator_service() {
    return $this->off_elevator_service;
  }

  public function setOff_elevator_service( $off_elevator_service ) {
    $this->off_elevator_service = $off_elevator_service;
  }

  public function getOff_fire_sprinkler() {
    return $this->off_fire_sprinkler;
  }

  public function setOff_fire_sprinkler( $off_fire_sprinkler ) {
    $this->off_fire_sprinkler = $off_fire_sprinkler;
  }

  public function getOff_type_hvac() {
    return $this->off_type_hvac;
  }

  public function setOff_type_hvac( $off_type_hvac ) {
    $this->off_type_hvac = $off_type_hvac;
  }

  public function getRest_alcohol() {
    return $this->rest_alcohol;
  }

  public function setRest_alcohol( $rest_alcohol ) {
    $this->rest_alcohol = $rest_alcohol;
  }

  public function getRest_drive_thru() {
    return $this->rest_drive_thru;
  }

  public function setRest_drive_thru( $rest_drive_thru ) {
    $this->rest_drive_thru = $rest_drive_thru;
  }

  public function getRest_no_seats() {
    return $this->rest_no_seats;
  }

  public function setRest_no_seats( $rest_no_seats ) {
    $this->rest_no_seats = $rest_no_seats;
  }

  public function getRest_playground() {
    return $this->rest_playground;
  }

  public function setRest_playground( $rest_playground ) {
    $this->rest_playground = $rest_playground;
  }

  public function getShop_achor_space_inc() {
    return $this->shop_achor_space_inc;
  }

  public function setShop_achor_space_inc( $shop_achor_space_inc ) {
    $this->shop_achor_space_inc = $shop_achor_space_inc;
  }

  public function getShop_anchor_pct() {
    return $this->shop_anchor_pct;
  }

  public function setShop_anchor_pct( $shop_anchor_pct ) {
    $this->shop_anchor_pct = $shop_anchor_pct;
  }

  public function getShop_anchor_sf() {
    return $this->shop_anchor_sf;
  }

  public function setShop_anchor_sf( $shop_anchor_sf ) {
    $this->shop_anchor_sf = $shop_anchor_sf;
  }

  public function getShop_anchor_tenant() {
    return $this->shop_anchor_tenant;
  }

  public function setShop_anchor_tenant( $shop_anchor_tenant ) {
    $this->shop_anchor_tenant = $shop_anchor_tenant;
  }

  public function getShop_inline_pct() {
    return $this->shop_inline_pct;
  }

  public function setShop_inline_pct( $shop_inline_pct ) {
    $this->shop_inline_pct = $shop_inline_pct;
  }

  public function getShop_inline_sf() {
    return $this->shop_inline_sf;
  }

  public function setShop_inline_sf( $shop_inline_sf ) {
    $this->shop_inline_sf = $shop_inline_sf;
  }

  public function getShop_other_tenant() {
    return $this->shop_other_tenant;
  }

  public function setShop_other_tenant( $shop_other_tenant ) {
    $this->shop_other_tenant = $shop_other_tenant;
  }

  public function getShop_total_gba() {
    return $this->shop_total_gba;
  }

  public function setShop_total_gba( $shop_total_gba ) {
    $this->shop_total_gba = $shop_total_gba;
  }

  public function getShop_total_nra() {
    return $this->shop_total_nra;
  }

  public function setShop_total_nra( $shop_total_nra ) {
    $this->shop_total_nra = $shop_total_nra;
  }

  public function getSs_alarm() {
    return $this->ss_alarm;
  }

  public function setSs_alarm( $ss_alarm ) {
    $this->ss_alarm = $ss_alarm;
  }

  public function getSs_boat() {
    return $this->ss_boat;
  }

  public function setSs_boat( $ss_boat ) {
    $this->ss_boat = $ss_boat;
  }

  public function getSs_code_access() {
    return $this->ss_code_access;
  }

  public function setSs_code_access( $ss_code_access ) {
    $this->ss_code_access = $ss_code_access;
  }

  public function getSs_heat() {

    return $this->ss_heat;
  }

  public function setSs_heat( $ss_heat ) {
    $this->ss_heat = $ss_heat;
  }

  public function getSs_on_site() {
    return $this->ss_on_site;
  }

  public function setSs_on_site( $ss_on_site ) {
    $this->ss_on_site = $ss_on_site;
  }

  public function getSs_residence() {
    return $this->ss_residence;
  }

  public function setSs_residence( $ss_residence ) {
    $this->ss_residence = $ss_residence;
  }

  public function getSs_residence_desc() {
    return $this->ss_residence_desc;
  }

  public function setSs_residence_desc( $ss_residence_desc ) {
    $this->ss_residence_desc = $ss_residence_desc;
  }

  public function getSs_security() {
    return $this->ss_security;
  }

  public function setSs_security( $ss_security ) {
    $this->ss_security = $ss_security;
  }

  public function getStore_avg_month_gallon() {
    return $this->store_avg_month_gallon;
  }

  public function setStore_avg_month_gallon( $store_avg_month_gallon ) {
    $this->store_avg_month_gallon = $store_avg_month_gallon;
  }

  public function getStore_canopy() {
    return $this->store_canopy;
  }

  public function setStore_canopy( $store_canopy ) {
    $this->store_canopy = $store_canopy;
  }

  public function getStore_canopy_desc() {
    return $this->store_canopy_desc;
  }

  public function setStore_canopy_desc( $store_canopy_desc ) {
    $this->store_canopy_desc = $store_canopy_desc;
  }

  public function getStore_chain_affil() {
    return $this->store_chain_affil;
  }

  public function setStore_chain_affil( $store_chain_affil ) {
    $this->store_chain_affil = $store_chain_affil;
  }

  public function getStore_co_chain_affil() {
    return $this->store_co_chain_affil;
  }

  public function setStore_co_chain_affil( $store_co_chain_affil ) {
    $this->store_co_chain_affil = $store_co_chain_affil;
  }

  public function getStore_fuel_desc() {
    return $this->store_fuel_desc;
  }

  public function setStore_fuel_desc( $store_fuel_desc ) {
    $this->store_fuel_desc = $store_fuel_desc;
  }

  public function getStore_month_car_wash_sales() {
    return $this->store_month_car_wash_sales;
  }

  public function setStore_month_car_wash_sales( $store_month_car_wash_sales ) {
    $this->store_month_car_wash_sales = $store_month_car_wash_sales;
  }

  public function getStore_month_mini_sales() {
    return $this->store_month_mini_sales;
  }

  public function setStore_month_mini_sales( $store_month_mini_sales ) {
    $this->store_month_mini_sales = $store_month_mini_sales;
  }

  public function getStore_month_store_sales() {
    return $this->store_month_store_sales;
  }

  public function setStore_month_store_sales( $store_month_store_sales ) {
    $this->store_month_store_sales = $store_month_store_sales;
  }

  public function getStore_no_fuel() {
    return $this->store_no_fuel;
  }

  public function setStore_no_fuel( $store_no_fuel ) {
    $this->store_no_fuel = $store_no_fuel;
  }

  public function getStore_total_month_sales() {
    return $this->store_total_month_sales;
  }

  public function setStore_total_month_sales( $store_total_month_sales ) {
    $this->store_total_month_sales = $store_total_month_sales;
  }

  public function getVeh_level() {
    return $this->veh_level;
  }

  public function setVeh_level( $veh_level ) {
    $this->veh_level = $veh_level;
  }

  public function getVeh_service_sf() {
    return $this->veh_service_sf;
  }

  public function setVeh_service_sf( $veh_service_sf ) {
    $this->veh_service_sf = $veh_service_sf;
  }

  public function getVeh_showroom_pct() {
    return $this->veh_showroom_pct;
  }

  public function setVeh_showroom_pct( $veh_showroom_pct ) {
    $this->veh_showroom_pct = $veh_showroom_pct;
  }

  public function getVeh_showroom_sf() {
    return $this->veh_showroom_sf;
  }

  public function setVeh_showroom_sf( $veh_showroom_sf ) {
    $this->veh_showroom_sf = $veh_showroom_sf;
  }

  public function getVeh_tunnel() {
    return $this->veh_tunnel;
  }

  public function setVeh_tunnel( $veh_tunnel ) {
    $this->veh_tunnel = $veh_tunnel;
  }

  public function getMf_no_single() {
    return $this->mf_no_single;
  }

  public function setMf_no_single( $mf_no_single ) {
    $this->mf_no_single = $mf_no_single;
  }

  public function getMf_sw_low_rent() {
    return $this->mf_sw_low_rent;
  }

  public function setMf_sw_low_rent( $mf_sw_low_rent ) {
    $this->mf_sw_low_rent = $mf_sw_low_rent;
  }

  public function getMf_sw_high_rent() {
    return $this->mf_sw_high_rent;
  }

  public function setMf_sw_high_rent( $mf_sw_high_rent ) {
    $this->mf_sw_high_rent = $mf_sw_high_rent;
  }

  public function getMf_sw_avg_rent() {
    return $this->mf_sw_avg_rent;
  }

  public function setMf_sw_avg_rent( $mf_sw_avg_rent ) {
    $this->mf_sw_avg_rent = $mf_sw_avg_rent;
  }

  public function getMf_no_double() {
    return $this->mf_no_double;
  }

  public function setMf_no_double( $mf_no_double ) {
    $this->mf_no_double = $mf_no_double;
  }

  public function getMf_dw_low_rent() {
    return $this->mf_dw_low_rent;
  }

  public function setMf_dw_low_rent( $mf_dw_low_rent ) {
    $this->mf_dw_low_rent = $mf_dw_low_rent;
  }

  public function getMf_dw_high_rent() {
    return $this->mf_dw_high_rent;
  }

  public function setMf_dw_high_rent( $mf_dw_high_rent ) {
    $this->mf_dw_high_rent = $mf_dw_high_rent;
  }

  public function getMf_dw_avg_rent() {
    return $this->mf_dw_avg_rent;
  }

  public function setMf_dw_avg_rent( $mf_dw_avg_rent ) {
    $this->mf_dw_avg_rent = $mf_dw_avg_rent;
  }

  public function getMf_no_triple() {
    return $this->mf_no_triple;
  }

  public function setMf_no_triple( $mf_no_triple ) {
    $this->mf_no_triple = $mf_no_triple;
  }

  public function getMf_tw_low_rent() {
    return $this->mf_tw_low_rent;
  }

  public function setMf_tw_low_rent( $mf_tw_low_rent ) {
    $this->mf_tw_low_rent = $mf_tw_low_rent;
  }

  public function getMf_tw_high_rent() {
    return $this->mf_tw_high_rent;
  }

  public function setMf_tw_high_rent( $mf_tw_high_rent ) {
    $this->mf_tw_high_rent = $mf_tw_high_rent;
  }

  public function getMf_tw_avg_rent() {
    return $this->mf_tw_avg_rent;
  }

  public function setMf_tw_avg_rent( $mf_tw_avg_rent ) {
    $this->mf_tw_avg_rent = $mf_tw_avg_rent;
  }

  public function getMf_no_rv_spaces() {
    return $this->mf_no_rv_spaces;
  }

  public function setMf_no_rv_spaces( $mf_no_rv_spaces ) {
    $this->mf_no_rv_spaces = $mf_no_rv_spaces;
  }

  public function getMf_rv_low_rent() {
    return $this->mf_rv_low_rent;
  }

  public function setMf_rv_low_rent( $mf_rv_low_rent ) {
    $this->mf_rv_low_rent = $mf_rv_low_rent;
  }

  public function getMf_rv_high_rent() {
    return $this->mf_rv_high_rent;
  }

  public function setMf_rv_high_rent( $mf_rv_high_rent ) {
    $this->mf_rv_high_rent = $mf_rv_high_rent;
  }

  public function getMf_rv_avg_rent() {
    return $this->mf_rv_avg_rent;
  }

  public function setMf_rv_avg_rent( $mf_rv_avg_rent ) {
    $this->mf_rv_avg_rent = $mf_rv_avg_rent;
  }

  public function getMf_high_rent() {
    return $this->mf_high_rent;
  }

  public function setMf_high_rent( $mf_high_rent ) {
    $this->mf_high_rent = $mf_high_rent;
  }

  public function getMf_total_spaces() {
    return $this->mf_total_spaces;
  }

  public function setMf_total_spaces( $mf_total_spaces ) {
    $this->mf_total_spaces = $mf_total_spaces;
  }

  public function getMf_total_avg_rent() {
    return $this->mf_total_avg_rent;
  }

  public function setMf_total_avg_rent( $mf_total_avg_rent ) {
    $this->mf_total_avg_rent = $mf_total_avg_rent;
  }

  public function getImptemp() {
    return $this->imptemp;
  }

  public function setImptemp( $imptemp ) {
    $this->imptemp = $imptemp;
  }

  public function getCaprate_db() {
    return $this->caprate_db;
  }

  public function setCaprate_db( $caprate_db ) {
    $this->caprate_db = $caprate_db;
  }

  public function getImproved_db() {
    return $this->improved_db;
  }

  public function setImproved_db( $improved_db ) {
    $this->improved_db = $improved_db;
  }

  public function getImpwordtemplate() {
    return $this->impwordtemplate;
  }

  public function setImpwordtemplate( $impwordtemplate ) {
    $this->impwordtemplate = $impwordtemplate;
  }

  public function getDaitemplate() {
    return $this->daitemplate;
  }

  public function setDaitemplate( $daitemplate ) {
    $this->daitemplate = $daitemplate;
  }

  public function getDaltemplate() {
    return $this->daltemplate;
  }

  public function setDaltemplate( $daltemplate ) {
    $this->daltemplate = $daltemplate;
  }

  public function getDartemplate() {
    return $this->dartemplate;
  }

  public function setDartemplate( $dartemplate ) {
    $this->dartemplate = $dartemplate;
  }

  public function getAdddartemplate() {
    return $this->adddartemplate;
  }

  public function setAdddartemplate( $adddartemplate ) {
    $this->adddartemplate = $adddartemplate;
  }

  public function getImpexceltemplate() {
    return $this->impexceltemplate;
  }

  public function setImpexceltemplate( $impexceltemplate ) {
    $this->impexceltemplate = $impexceltemplate;
  }

  public function getLandtemp() {
    return $this->landtemp;
  }

  public function setLandtemp( $landtemp ) {
    $this->landtemp = $landtemp;
  }

  public function getLand_db() {
    return $this->land_db;
  }

  public function setLand_db( $land_db ) {
    $this->land_db = $land_db;
  }

  public function getLandwordtemplate() {
    return $this->landwordtemplate;
  }

  public function setLandwordtemplate( $landwordtemplate ) {
    $this->landwordtemplate = $landwordtemplate;
  }

  public function getLandexceltemplate() {
    return $this->landexceltemplate;
  }

  public function setLandexceltemplate( $landexceltemplate ) {
    $this->landexceltemplate = $landexceltemplate;
  }

  public function getLeasetemp() {
    return $this->leasetemp;
  }

  public function setLeasetemp( $leasetemp ) {
    $this->leasetemp = $leasetemp;
  }

  public function getLease_db() {
    return $this->lease_db;
  }

  public function setLease_db( $lease_db ) {
    $this->lease_db = $lease_db;
  }

  public function getLeasewordtemplate() {
    return $this->leasewordtemplate;
  }

  public function setLeasewordtemplate( $leasewordtemplate ) {
    $this->leasewordtemplate = $leasewordtemplate;
  }

  public function getAddrentwordtemp() {
    return $this->addrentwordtemp;
  }

  public function setAddrentwordtemp( $addrentwordtemp ) {
    $this->addrentwordtemp = $addrentwordtemp;
  }

  public function getLeaseexceltemplate() {
    return $this->leaseexceltemplate;
  }

  public function setLeaseexceltemplate( $leaseexceltemplate ) {
    $this->leaseexceltemplate = $leaseexceltemplate;
  }

  public function getAddrentextemp() {
    return $this->addrentextemp;
  }

  public function setAddrentextemp( $addrentextemp ) {
    $this->addrentextemp = $addrentextemp;
  }

  public function getMiscrent_db() {
    return $this->miscrent_db;
  }

  public function setMiscrent_db( $miscrent_db ) {
    $this->miscrent_db = $miscrent_db;
  }

  public function getXtrarents() {
    return $this->xtrarents;
  }

  public function setXtrarents( $xtrarents ) {
    $this->xtrarents = $xtrarents;
  }

  public function getOtrenttemplate() {
    return $this->otrenttemplate;
  }

  public function setOtrenttemplate( $otrenttemplate ) {
    $this->otrenttemplate = $otrenttemplate;
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


  function __construct() {}

  function __destruct() {}
}
?>