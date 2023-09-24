<?php
class appraisalsDBController{
    public $db;

	public function getAssessedValues($id){
		$sql_fields[] = ASSESSED_TABLE.".mappage";
		$sql_fields[] = ASSESSED_TABLE.".taxlot";
		$sql_fields[] = ASSESSED_TABLE.".parcelno";
		$sql_fields[] = ASSESSED_TABLE.".assessedglasf";
		$sql_fields[] = ASSESSED_TABLE.".marketland";
		$sql_fields[] = ASSESSED_TABLE.".marketimp";
		$sql_fields[] = ASSESSED_TABLE.".markettotal";
		$sql_fields[] = ASSESSED_TABLE.".measure50";
		$sql_fields[] = ASSESSED_TABLE.".annualtaxes";
		$sql_fields[] = ASSESSED_TABLE.".id";
		
		$tables_sql[] = ASSESSED_TABLE;
		
		 $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
		$search_sql[] = ASSESSED_TABLE.".FK_ReportID=:id";
		
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".ASSESSED_TABLE.".id ASC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;

    }



    public function getRecord($id){
        $sql_fields = array();
        
        $sql_fields[] = REPORT_TABLE.".id";
        $sql_fields[] = REPORT_TABLE.".status";
        $sql_fields[] = REPORT_TABLE.".priority";
        $sql_fields[] = REPORT_TABLE.".AssignedTo";
        $sql_fields[] = REPORT_TABLE.".DueDate";
        $sql_fields[] = REPORT_TABLE.".reportname";
        $sql_fields[] = REPORT_TABLE.".OwnerID";
        $sql_fields[] = REPORT_TABLE.".boxurl";
        $sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateCreated,'%M %e %Y %r') as DateCreated";
        $sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateModified,'%M %e %Y %r') as DateModified";
        
        $sql_fields[] = APPRAISALS_TABLE.".job_no";
        $sql_fields[] = "CONCAT('$', FORMAT(".APPRAISALS_TABLE.".bid_fee,0)) as bid_fee";
        $sql_fields[] = APPRAISALS_TABLE.".appraisal_type";
        $sql_fields[] = APPRAISALS_TABLE.".purpose_of_appraisal";
        $sql_fields[] = APPRAISALS_TABLE.".client_name";
        $sql_fields[] = APPRAISALS_TABLE.".client_reference_no";
        $sql_fields[] = APPRAISALS_TABLE.".borrower";
        $sql_fields[] = APPRAISALS_TABLE.".estate_appraised";
        $sql_fields[] = APPRAISALS_TABLE.".prosstab_est_app";
        $sql_fields[] = APPRAISALS_TABLE.".proscomp_est_app";
        $sql_fields[] = APPRAISALS_TABLE.".as_is";
        $sql_fields[] = APPRAISALS_TABLE.".prospective_stabilized";
        $sql_fields[] = APPRAISALS_TABLE.".prospective_completion";
        $sql_fields[] = APPRAISALS_TABLE.".retrospective";
        $sql_fields[] = APPRAISALS_TABLE.".eff_date_value";
        $sql_fields[] = APPRAISALS_TABLE.".prosstab_dov";
        $sql_fields[] = APPRAISALS_TABLE.".proscomp_dov";
        $sql_fields[] = APPRAISALS_TABLE.".retro_dov";         
        $sql_fields[] = APPRAISALS_TABLE.".inspect_date";
        $sql_fields[] = APPRAISALS_TABLE.".site_valuation";
        $sql_fields[] = APPRAISALS_TABLE.".cost_approach";
        $sql_fields[] = APPRAISALS_TABLE.".income_approach";
        $sql_fields[] = APPRAISALS_TABLE.".groundlease";
        $sql_fields[] = APPRAISALS_TABLE.".sales_comparison";
        $sql_fields[] = APPRAISALS_TABLE.".ownaddress";
        $sql_fields[] = APPRAISALS_TABLE.".owncity";
        $sql_fields[] = APPRAISALS_TABLE.".ownstate";
        $sql_fields[] = APPRAISALS_TABLE.".ownzipcode";
        $sql_fields[] = APPRAISALS_TABLE.".rowprojname";
        $sql_fields[] = APPRAISALS_TABLE.".reqinsdate";
        $sql_fields[] = APPRAISALS_TABLE.".rowdold";
        $sql_fields[] = APPRAISALS_TABLE.".rowsfacq";
        $sql_fields[] = APPRAISALS_TABLE.".rowappfirm";
        $sql_fields[] = APPRAISALS_TABLE.".rowappname";
        $sql_fields[] = APPRAISALS_TABLE.".rowdoreport";
        $sql_fields[] = APPRAISALS_TABLE.".rowdoreview";
        $sql_fields[] = APPRAISALS_TABLE.".special_comments";
        $sql_fields[] = APPRAISALS_TABLE.".client_db";
        $sql_fields[] = APPRAISALS_TABLE.".appraiser_db";
        $sql_fields[] = APPRAISALS_TABLE.".caprate_db";
        $sql_fields[] = APPRAISALS_TABLE.".improved_db";
        $sql_fields[] = APPRAISALS_TABLE.".impwordtemplate";
        $sql_fields[] = APPRAISALS_TABLE.".daitemplate";
        $sql_fields[] = APPRAISALS_TABLE.".daltemplate";
        $sql_fields[] = APPRAISALS_TABLE.".dartemplate";
        $sql_fields[] = APPRAISALS_TABLE.".impexceltemplate";
        $sql_fields[] = APPRAISALS_TABLE.".land_db";
        $sql_fields[] = APPRAISALS_TABLE.".landwordtemplate";
        $sql_fields[] = APPRAISALS_TABLE.".landexceltemplate";
        $sql_fields[] = APPRAISALS_TABLE.".lease_db";
        $sql_fields[] = APPRAISALS_TABLE.".leasewordtemplate";
        $sql_fields[] = APPRAISALS_TABLE.".leaseexceltemplate";
        $sql_fields[] = APPRAISALS_TABLE.".miscrent_db";
        $sql_fields[] = APPRAISALS_TABLE.".otrenttemplate";        
        $sql_fields[] = APPRAISALS_TABLE.".sale_agreement";
        $sql_fields[] = APPRAISALS_TABLE.".pro_forma";
        $sql_fields[] = APPRAISALS_TABLE.".tenant_leases";
        $sql_fields[] = APPRAISALS_TABLE.".market_packet";
        $sql_fields[] = APPRAISALS_TABLE.".additional_docs";
        $sql_fields[] = APPRAISALS_TABLE.".assessedyear";
        
        $sql_fields[] = PROPERTY_TABLE.".property_name";
        $sql_fields[] = PROPERTY_TABLE.".address";
        $sql_fields[] = PROPERTY_TABLE.".streetnumber";
        $sql_fields[] = PROPERTY_TABLE.".streetname";
        $sql_fields[] = PROPERTY_TABLE.".city";
        $sql_fields[] = PROPERTY_TABLE.".county";
        $sql_fields[] = PROPERTY_TABLE.".state";
        $sql_fields[] = PROPERTY_TABLE.".zip_code";
        $sql_fields[] = PROPERTY_TABLE.".lat";
        $sql_fields[] = PROPERTY_TABLE.".lng";
        $sql_fields[] = PROPERTY_TABLE.".propertytype";
        $sql_fields[] = PROPERTY_TABLE.".propertysubtype";
        $sql_fields[] = PROPERTY_TABLE.".msa";
        $sql_fields[] = PROPERTY_TABLE.".genmarket";
        $sql_fields[] = PROPERTY_TABLE.".submarkid";
        $sql_fields[] = PROPERTY_TABLE.".legal_desc";
        $sql_fields[] = PROPERTY_TABLE.".photo1";
        $sql_fields[] = "if(".PROPERTY_TABLE.".photo1 = '', 'no-photo.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) as image";
        $sql_fields[] = PROPERTY_TABLE.".thumbnail";
        $sql_fields[] = PROPERTY_TABLE.".owner_type";
        $sql_fields[] = PROPERTY_TABLE.".owner_name";
        $sql_fields[] = PROPERTY_TABLE.".gla_inputtype";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gla_inputsize,3) AS gla_inputsize";        
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_sf,0) AS gross_land_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_acre,3) AS gross_land_acre";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".unusable_sf,0) AS unusable_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".unusable_acre,3) AS unusable_acre";
        $sql_fields[] = PROPERTY_TABLE.".unusable_desc";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_sf,0) AS net_usable_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_acre,3) AS net_usable_acre";
        $sql_fields[] = PROPERTY_TABLE.".net_usable_desc";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".surplus_sf,0) AS surplus_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".surplus_acre,3) AS surplus_acre";
        $sql_fields[] = PROPERTY_TABLE.".surplus_desc";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".excess_sf,0) AS excess_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".excess_acre,3) AS excess_acre";
        $sql_fields[] = PROPERTY_TABLE.".excess_desc";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".primary_acre,3) AS primary_acre";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".primary_sf,0) AS primary_sf";
        $sql_fields[] = PROPERTY_TABLE.".shape";
        $sql_fields[] = PROPERTY_TABLE.".utilities";
        $sql_fields[] = PROPERTY_TABLE.".exposure";
        $sql_fields[] = PROPERTY_TABLE.".flood_plain";
        $sql_fields[] = PROPERTY_TABLE.".topography";
        $sql_fields[] = PROPERTY_TABLE.".frontage";
        $sql_fields[] = PROPERTY_TABLE.".orientation";
        $sql_fields[] = PROPERTY_TABLE.".site_access";
        $sql_fields[] = PROPERTY_TABLE.".easement";
        $sql_fields[] = PROPERTY_TABLE.".depth";
        $sql_fields[] = PROPERTY_TABLE.".easement_desc";
        $sql_fields[] = PROPERTY_TABLE.".zoning_code";
        $sql_fields[] = PROPERTY_TABLE.".zoning_desc";
        $sql_fields[] = PROPERTY_TABLE.".zoning_juris";        
        $sql_fields[] = PROPERTY_TABLE.".zoning_overlay";
        $sql_fields[] = PROPERTY_TABLE.".zoning_overlay_desc";
        $sql_fields[] = PROPERTY_TABLE.".zoning_details";        
        $sql_fields[] = PROPERTY_TABLE.".max_building_ht";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".floor_area_ratio,1) AS floor_area_ratio";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".max_floor_area,1) AS max_floor_area";
        $sql_fields[] = PROPERTY_TABLE.".traffic_count";
        $sql_fields[] = PROPERTY_TABLE.".traffic_date";
        $sql_fields[] = PROPERTY_TABLE.".side_street";
        $sql_fields[] = PROPERTY_TABLE.".inter_street";
        $sql_fields[] = PROPERTY_TABLE.".distance_direction";

        
        $sql_fields[] = BUILDING_TABLE.".no_building";
        $sql_fields[] = BUILDING_TABLE.".no_stories";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".floor_1_gba,0) AS floor_1_gba";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".floor_2_gba,0) AS floor_2_gba";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".total_basement_gba,0) AS total_basement_gba";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".basement_pct_gba,1),' %') AS basement_pct_gba";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) AS overall_gba";
        $sql_fields[] = BUILDING_TABLE.".gba_source";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".floor_1_nra,0) AS floor_1_nra";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".floor_2_nra,0) AS floor_2_nra";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".total_basement_nra,0) AS total_basement_nra";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".basement_pct_nra,1),' %') AS basement_pct_nra";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_nra,0) AS overall_nra";
        $sql_fields[] = BUILDING_TABLE.".nra_source";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".eff_ratio_pct_nra,1),' %') AS eff_ratio_pct_nra";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".land_build_ratio_primary,1) AS land_build_ratio_primary";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".site_cover_primary,1),' %') AS site_cover_primary";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".land_build_ratio_overall,1) AS land_build_ratio_overall";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".site_cover_overall,1),' %') AS site_cover_overall";        
        $sql_fields[] = BUILDING_TABLE.".basement_type";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".storage_basement_sf,0) AS storage_basement_sf";        
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".ancillary_area_sf,0) AS ancillary_area_sf";
        $sql_fields[] = BUILDING_TABLE.".ancillary_area_desc";
        $sql_fields[] = BUILDING_TABLE.".building_comments";
        $sql_fields[] = BUILDING_TABLE.".year_built";
        $sql_fields[] = BUILDING_TABLE.".year_built_search";
        $sql_fields[] = BUILDING_TABLE.".last_renovation";
        $sql_fields[] = BUILDING_TABLE.".no_units";
        $sql_fields[] = BUILDING_TABLE.".no_tenants";
        $sql_fields[] = BUILDING_TABLE.".occupancy_type";
        $sql_fields[] = BUILDING_TABLE.".building_quality";
        $sql_fields[] = BUILDING_TABLE.".int_condition";
        $sql_fields[] = BUILDING_TABLE.".ext_condition";
        $sql_fields[] = BUILDING_TABLE.".building_class";
        $sql_fields[] = BUILDING_TABLE.".const_class";
        $sql_fields[] = BUILDING_TABLE.".const_descr";
        $sql_fields[] = BUILDING_TABLE.".other_const_features";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".parking_stalls,0) AS parking_stalls";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".parking_ratio_gba,2) AS parking_ratio_gba";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".parking_ratio_nra,2) AS parking_ratio_nra";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".parking_ratio_unit,1) AS parking_ratio_unit";
        $sql_fields[] = BUILDING_TABLE.".parking_type";
        $sql_fields[] = BUILDING_TABLE.".parking_ratio";
        
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".list_price,0)) AS list_price";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".record_date";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".sale_status";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".sale_comments";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".grantor";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".grantee";
        
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_bay_dimension";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_clear_height";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_column_spacing";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_ext_office_1,0) AS ind_ext_office_1";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_ext_office_2,0) AS ind_ext_office_2";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_fire";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_hvac";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_int_office_1,0) AS ind_int_office_1";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_int_office_2,0) AS ind_int_office_2";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_mezz_desc";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_no_rail";
        $sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_pct_office,1),' %') AS ind_pct_office";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_rail";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_storage_mess";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_storage_mezz_sf,0) AS ind_storage_mezz_sf";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_total_office,0) AS ind_total_office";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_truck_dock";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_truck_grade";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".off_elevator_service";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".off_fire_sprinkler";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".off_type_hvac";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_alcohol";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_drive_thru";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_no_seats";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_playground";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".shop_achor_space_inc";
        $sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_anchor_pct,1),' %') AS shop_anchor_pct";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_anchor_sf,0) AS shop_anchor_sf";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".shop_anchor_tenant";
        $sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_inline_pct,1),' %') AS shop_inline_pct";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_inline_sf,0) AS shop_inline_sf";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".shop_other_tenant";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_total_gba,0) AS shop_total_gba";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_total_nra,0) AS shop_total_nra";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_alarm";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_boat";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_code_access";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_heat";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_on_site";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_residence";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_residence_desc";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_security";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".store_avg_month_gallon,0) AS store_avg_month_gallon";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_canopy";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_canopy_desc";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_chain_affil";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_co_chain_affil";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_fuel_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".store_month_car_wash_sales,0)) AS store_month_car_wash_sales";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".store_month_mini_sales,0)) AS store_month_mini_sales";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".store_month_store_sales,0)) AS store_month_store_sales";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_no_fuel";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".store_total_month_sales,0)) AS store_total_month_sales";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".veh_level";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".veh_service_sf,0) AS veh_service_sf";
        $sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".veh_showroom_pct,1),' %') AS veh_showroom_pct";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".veh_showroom_sf,0) AS veh_showroom_sf";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".veh_tunnel";
        
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_no_single";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_sw_low_rent,0)) AS mf_sw_low_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_sw_high_rent,0)) AS mf_sw_high_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_sw_avg_rent,0)) AS mf_sw_avg_rent";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_no_double";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_dw_low_rent,0)) AS mf_dw_low_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_dw_high_rent,0)) AS mf_dw_high_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_dw_avg_rent,0)) AS mf_dw_avg_rent";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_no_triple";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_tw_low_rent,0)) AS mf_tw_low_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_tw_high_rent,0)) AS mf_tw_high_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_tw_avg_rent,0)) AS mf_tw_avg_rent";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_no_rv_spaces";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_rv_low_rent,0)) AS mf_rv_low_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_rv_high_rent,0)) AS mf_rv_high_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_rv_avg_rent,0)) AS mf_rv_avg_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_high_rent,0)) AS mf_high_rent";
        $sql_fields[] = "FORMAT(".MULTIFAMILY_TABLE.".mf_total_spaces,0) AS mf_total_spaces";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_total_avg_rent,0)) AS mf_total_avg_rent";
        
        $sql_fields[] = TEMPLATES_TABLE.".templatepath as imptemp";
        $sql_fields[] = TEMPLATES_A_TABLE.".templatepath as landtemp";
        $sql_fields[] = TEMPLATES_B_TABLE.".templatepath as leasetemp";
        $sql_fields[] = "CONCAT(".WFUSERS_TABLE.".firstname,' ',".WFUSERS_TABLE.".lastname) as CreatedBy";
        $sql_fields[] = "CONCAT(".WFUSERS_M_TABLE.".firstname,' ',".WFUSERS_M_TABLE.".lastname) as ModifiedBy";

        $tables_sql[] = REPORT_TABLE;
        $tables_sql[] = ' JOIN '.APPRAISALS_TABLE.' ON '.REPORT_TABLE.'.id='.APPRAISALS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.PROPERTY_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTY_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.BUILDING_TABLE.' ON '.REPORT_TABLE.'.id='.BUILDING_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.SALES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.SALES_TRANSACTIONS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.PROPERTYTYPE_DETAILS_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTYTYPE_DETAILS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.MULTIFAMILY_TABLE.' ON '.REPORT_TABLE.'.id='.MULTIFAMILY_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFUSERS_TABLE.' ON '.REPORT_TABLE.'.CreatedBy='.WFUSERS_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFUSERS_TABLE.' '.WFUSERS_M_TABLE.' ON '.REPORT_TABLE.'.ModifiedBy='.WFUSERS_M_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.TEMPLATES_TABLE.' ON '.APPRAISALS_TABLE.'.impwordtemplate='.TEMPLATES_TABLE.'.id';
        
        $tables_sql[] = ' LEFT OUTER JOIN '.TEMPLATES_TABLE. ' '.TEMPLATES_A_TABLE.' ON '.APPRAISALS_TABLE.'.landwordtemplate='.TEMPLATES_A_TABLE.'.id';
        
        $tables_sql[] = ' LEFT OUTER JOIN '.TEMPLATES_TABLE. ' '.TEMPLATES_B_TABLE.' ON '.APPRAISALS_TABLE.'.leasewordtemplate='.TEMPLATES_B_TABLE.'.id';
        $search_sql[] = REPORT_TABLE.".id=:id";

        $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".REPORT_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        return $rows;
    }
    
    public function appraisalsOperation($appraisals,$user_id){
        $actionMode = "INSERT";
        if(isset($_GET['id'])){
            $actionMode = "UPDATE";
        }

        try{
            $this->db->beginTransaction();

            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".REPORT_TABLE." (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, CreatedBy, ModifiedBy, boxurl)
    				VALUES  (:FK_ReportTypeID, :status, :priority, :AssignedTo, :DueDate, :OwnerID, :reportname, :CreatedBy, :ModifiedBy, :boxurl)");
        
                $stmt->bindValue(':FK_ReportTypeID',1,PDO::PARAM_INT);
                $stmt->bindValue(':CreatedBy',$user_id,PDO::PARAM_INT);
            }else{
                $stmt = $this->db->prepare("UPDATE ".REPORT_TABLE." SET status=:status, DateModified=:DateModified, priority=:priority, AssignedTo=:AssignedTo, DueDate=:DueDate, OwnerID=:OwnerID, reportname=:reportname, ModifiedBy=:ModifiedBy, boxurl=:boxurl
    				WHERE ".REPORT_TABLE.".id=:reportID");

                $stmt->bindValue(':DateModified',$appraisals->getDateModified(),PDO::PARAM_STR);
                $stmt->bindValue(':reportID',$appraisals->getId(),PDO::PARAM_INT);
            }
        
            /*Common bindings*/
            $stmt->bindValue(':status',$appraisals->getStatus(),PDO::PARAM_INT);
            $stmt->bindValue(':priority',$appraisals->getPriority(),PDO::PARAM_INT);
            $stmt->bindValue(':AssignedTo',$appraisals->getAssignedTo(),PDO::PARAM_INT);
            $stmt->bindValue(':DueDate',$appraisals->getDueDate(),PDO::PARAM_STR);            
            $stmt->bindValue(':OwnerID',$appraisals->getOwnerID(),PDO::PARAM_INT);
            $stmt->bindValue(':reportname',$appraisals->getReportname(),PDO::PARAM_STR);
            $stmt->bindValue(':ModifiedBy',$user_id,PDO::PARAM_INT);            
            $stmt->bindValue(':boxurl',$appraisals->getBoxurl(),PDO::PARAM_STR);
        
            $stmt->execute();
        
            if($actionMode=="INSERT"){
                $appraisals->setId($this->db->lastInsertId());
            }
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".APPRAISALS_TABLE." (FK_ReportID, job_no, bid_fee, appraisal_type, purpose_of_appraisal, client_name, client_reference_no, borrower, estate_appraised, prosstab_est_app, proscomp_est_app, as_is, prospective_stabilized, prospective_completion, retrospective, eff_date_value, prosstab_dov, proscomp_dov, retro_dov, inspect_date, site_valuation, cost_approach, income_approach, groundlease, sales_comparison, ownaddress, owncity, ownstate, ownzipcode, rowprojname, reqinsdate, rowdold, rowsfacq, rowappfirm, rowappname, rowdoreport, rowdoreview, special_comments, appraiser_db, client_db, caprate_db, improved_db, land_db, lease_db, sale_agreement, pro_forma, tenant_leases, market_packet, additional_docs, impwordtemplate, daitemplate, daltemplate, dartemplate, impexceltemplate, landwordtemplate, landexceltemplate, leasewordtemplate, leaseexceltemplate, miscrent_db, otrenttemplate, assessedyear) VALUES  (:FK_ReportID, :job_no, :bid_fee, :appraisal_type, :purpose_of_appraisal, :client_name, :client_reference_no, :borrower, :estate_appraised, :prosstab_est_app, :proscomp_est_app, :as_is, :prospective_stabilized, :prospective_completion, :retrospective, :eff_date_value, :prosstab_dov, :proscomp_dov, :retro_dov, :inspect_date, :site_valuation, :cost_approach, :income_approach, :groundlease, :sales_comparison, :ownaddress, :owncity, :ownstate, :ownzipcode, :rowprojname, :reqinsdate, :rowdold, :rowsfacq, :rowappfirm, :rowappname, :rowdoreport, :rowdoreview, :special_comments, :appraiser_db, :client_db, :caprate_db, :improved_db, :land_db, :lease_db, :sale_agreement, :pro_forma, :tenant_leases, :market_packet, :additional_docs, :impwordtemplate, :daitemplate, :daltemplate, :dartemplate, :impexceltemplate, :landwordtemplate, :landexceltemplate, :leasewordtemplate, :leaseexceltemplate, :miscrent_db, :otrenttemplate, :assessedyear)");
			}else{
                $stmt = $this->db->prepare("UPDATE ".APPRAISALS_TABLE." SET job_no=:job_no, bid_fee=:bid_fee, appraisal_type=:appraisal_type, purpose_of_appraisal=:purpose_of_appraisal, client_name=:client_name, client_reference_no=:client_reference_no, borrower=:borrower, estate_appraised=:estate_appraised, prosstab_est_app=:prosstab_est_app, proscomp_est_app=:proscomp_est_app, as_is=:as_is, prospective_stabilized=:prospective_stabilized, prospective_completion=:prospective_completion, retrospective=:retrospective, eff_date_value=:eff_date_value, prosstab_dov=:prosstab_dov, proscomp_dov=:proscomp_dov, retro_dov=:retro_dov, inspect_date=:inspect_date, site_valuation=:site_valuation, cost_approach=:cost_approach, income_approach=:income_approach, groundlease=:groundlease, sales_comparison=:sales_comparison, ownaddress=:ownaddress, owncity=:owncity, ownstate=:ownstate, ownzipcode=:ownzipcode, rowprojname=:rowprojname, reqinsdate=:reqinsdate, rowdold=:rowdold, rowsfacq=:rowsfacq, rowappfirm=:rowappfirm, rowappname=:rowappname, rowdoreport=:rowdoreport, rowdoreview=:rowdoreview, special_comments=:special_comments, appraiser_db=:appraiser_db, client_db=:client_db, caprate_db=:caprate_db, improved_db=:improved_db, land_db=:land_db, lease_db=:lease_db, sale_agreement=:sale_agreement, pro_forma=:pro_forma, tenant_leases=:tenant_leases, market_packet=:market_packet, additional_docs=:additional_docs, impwordtemplate=:impwordtemplate, daitemplate=:daitemplate, daltemplate=:daltemplate, dartemplate=:dartemplate, impexceltemplate=:impexceltemplate, landwordtemplate=:landwordtemplate, landexceltemplate=:landexceltemplate, leasewordtemplate=:leasewordtemplate, leaseexceltemplate=:leaseexceltemplate, miscrent_db=:miscrent_db, otrenttemplate=:otrenttemplate, assessedyear=:assessedyear
    			WHERE ".APPRAISALS_TABLE.".FK_ReportID=:FK_ReportID");
            }
        
            /*Common bindings*/
            $stmt->bindValue(':job_no',$appraisals->getJob_no(),PDO::PARAM_STR);
            $stmt->bindValue(':bid_fee',$appraisals->getBid_fee(),PDO::PARAM_INT);
            $stmt->bindValue(':appraisal_type',$appraisals->getAppraisal_type(),PDO::PARAM_INT);
            $stmt->bindValue(':purpose_of_appraisal',$appraisals->getPurpose_of_appraisal(),PDO::PARAM_INT);
            $stmt->bindValue(':client_name',$appraisals->getClient_name(),PDO::PARAM_STR);
            $stmt->bindValue(':client_reference_no',$appraisals->getClient_reference_no(),PDO::PARAM_STR);
            $stmt->bindValue(':borrower',$appraisals->getBorrower(),PDO::PARAM_STR);
            $stmt->bindValue(':estate_appraised',$appraisals->getEstate_appraised(),PDO::PARAM_INT);
            $stmt->bindValue(':prosstab_est_app',$appraisals->getProsstab_est_app(),PDO::PARAM_INT);
            $stmt->bindValue(':proscomp_est_app',$appraisals->getProscomp_est_app(),PDO::PARAM_INT);
            $stmt->bindValue(':as_is',$appraisals->getAs_is(),PDO::PARAM_INT);
            $stmt->bindValue(':prospective_stabilized',$appraisals->getProspective_stabilized(),PDO::PARAM_INT);
            $stmt->bindValue(':prospective_completion',$appraisals->getProspective_completion(),PDO::PARAM_INT);
            $stmt->bindValue(':retrospective',$appraisals->getRetrospective(),PDO::PARAM_INT);
            $stmt->bindValue(':eff_date_value',$appraisals->getEff_date_value(),PDO::PARAM_STR);
            $stmt->bindValue(':prosstab_dov',$appraisals->getProsstab_dov(),PDO::PARAM_STR);
            $stmt->bindValue(':proscomp_dov',$appraisals->getProscomp_dov(),PDO::PARAM_STR);
            $stmt->bindValue(':retro_dov',$appraisals->getRetro_dov(),PDO::PARAM_STR);
            $stmt->bindValue(':inspect_date',$appraisals->getInspect_date(),PDO::PARAM_STR);
            $stmt->bindValue(':site_valuation',$appraisals->getSite_valuation(),PDO::PARAM_INT);
            $stmt->bindValue(':cost_approach',$appraisals->getCost_approach(),PDO::PARAM_INT);
            $stmt->bindValue(':income_approach',$appraisals->getIncome_approach(),PDO::PARAM_INT);
            $stmt->bindValue(':groundlease',$appraisals->getGroundlease(),PDO::PARAM_INT);
            $stmt->bindValue(':sales_comparison',$appraisals->getSales_comparison(),PDO::PARAM_INT);
            $stmt->bindValue(':ownaddress',$appraisals->getOwnaddress(),PDO::PARAM_STR);
            $stmt->bindValue(':owncity',$appraisals->getOwncity(),PDO::PARAM_STR);
            $stmt->bindValue(':ownstate',$appraisals->getOwnstate(),PDO::PARAM_STR);
            $stmt->bindValue(':ownzipcode',$appraisals->getOwnzipcode(),PDO::PARAM_STR);
            $stmt->bindValue(':rowprojname',$appraisals->getRowprojname(),PDO::PARAM_STR);
            $stmt->bindValue(':reqinsdate',$appraisals->getReqinsdate(),PDO::PARAM_STR);
            $stmt->bindValue(':rowdold',$appraisals->getRowdold(),PDO::PARAM_STR);
            $stmt->bindValue(':rowsfacq',$appraisals->getRowsfacq(),PDO::PARAM_INT);
            $stmt->bindValue(':rowappfirm',$appraisals->getRowappfirm(),PDO::PARAM_STR);
            $stmt->bindValue(':rowappname',$appraisals->getRowappname(),PDO::PARAM_STR);
            $stmt->bindValue(':rowdoreport',$appraisals->getRowdoreport(),PDO::PARAM_STR);
            $stmt->bindValue(':rowdoreview',$appraisals->getRowdoreview(),PDO::PARAM_STR);
            $stmt->bindValue(':special_comments',$appraisals->getSpecial_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':appraiser_db',$appraisals->getAppraiser_db(),PDO::PARAM_STR);
            $stmt->bindValue(':client_db',$appraisals->getClient_db(),PDO::PARAM_STR);
            $stmt->bindValue(':caprate_db',$appraisals->getCaprate_db(),PDO::PARAM_STR);
            $stmt->bindValue(':improved_db',$appraisals->getImproved_db(),PDO::PARAM_STR);
            $stmt->bindValue(':land_db',$appraisals->getLand_db(),PDO::PARAM_STR);
            $stmt->bindValue(':lease_db',$appraisals->getLease_db(),PDO::PARAM_STR);
            $stmt->bindValue(':sale_agreement',$appraisals->getSale_agreement(),PDO::PARAM_INT);
            $stmt->bindValue(':pro_forma',$appraisals->getPro_forma(),PDO::PARAM_INT);
            $stmt->bindValue(':tenant_leases',$appraisals->getTenant_leases(),PDO::PARAM_INT);
            $stmt->bindValue(':market_packet',$appraisals->getMarket_packet(),PDO::PARAM_STR);
            $stmt->bindValue(':additional_docs',$appraisals->getAdditional_docs(),PDO::PARAM_STR);
            $stmt->bindValue(':impwordtemplate',$appraisals->getImpwordtemplate(),PDO::PARAM_STR);
            $stmt->bindValue(':daitemplate',$appraisals->getDaitemplate(),PDO::PARAM_STR);
            $stmt->bindValue(':daltemplate',$appraisals->getDaltemplate(),PDO::PARAM_STR);
            $stmt->bindValue(':dartemplate',$appraisals->getDartemplate(),PDO::PARAM_STR);
            $stmt->bindValue(':impexceltemplate',$appraisals->getImpexceltemplate(),PDO::PARAM_STR);
            $stmt->bindValue(':landwordtemplate',$appraisals->getLandwordtemplate(),PDO::PARAM_STR);
            $stmt->bindValue(':landexceltemplate',$appraisals->getLandexceltemplate(),PDO::PARAM_STR);
            $stmt->bindValue(':leasewordtemplate',$appraisals->getLeasewordtemplate(),PDO::PARAM_STR);
            $stmt->bindValue(':leaseexceltemplate',$appraisals->getLeaseexceltemplate(),PDO::PARAM_STR);
            $stmt->bindValue(':miscrent_db',$appraisals->getMiscrent_db(),PDO::PARAM_STR);
            $stmt->bindValue(':otrenttemplate',$appraisals->getOtrenttemplate(),PDO::PARAM_STR);
            $stmt->bindValue(':assessedyear',$appraisals->getAssessedyear(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$appraisals->getId(),PDO::PARAM_INT);
        
            $stmt->execute();

            $directory = "../comp_images/".$appraisals->getId();
            if (!is_dir($directory)){
                mkdir($directory, 0755, true);
            }
            $mediaUtilities = new rbe_mediaUtilities();
            if(!file_exists($_FILES['photo1']['tmp_name']) || !is_uploaded_file($_FILES['photo1']['tmp_name'])) {
                $final_file = $_POST['photo1path'];
                $final_file_thumb = $_POST['thumbpath'];
            } else {
                $file = explode(".", $_FILES["photo1"]["name"]);
                $file_loc = $_FILES['photo1']['tmp_name'];
                $file_size = $_FILES['photo1']['size'];
                $file_type = $_FILES['photo1']['type'];
                $folder = "../comp_images/" . $appraisals->getId() . "/";
                $new_file_name = round(microtime(true)) . '.' . end($file);
                $final_file=str_replace(' ','-',$new_file_name);
                move_uploaded_file($file_loc,$folder.$final_file);
                $mediaUtilities->imageTransformations($final_file,$folder,"",800,600,100,"","resize",true);
                $final_file_thumb = explode(".",$final_file);
                $extension = $final_file_thumb[count($final_file_thumb)-1];
                array_splice($final_file_thumb,count($final_file_thumb)-1);
                $final_file_thumb = implode(".",$final_file_thumb);
                $final_file_thumb = $final_file_thumb."-tn".".".$extension;
                $mediaUtilities->imageTransformations($final_file,$folder,"-tn",128,128,100,"","resize",true);
            }
            $appraisals->setPhoto1($final_file);
            $appraisals->setThumbnail($final_file_thumb);
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".PROPERTY_TABLE." (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, legal_desc, owner_type, owner_name, gla_inputtype, gla_inputsize, gross_land_sf, gross_land_acre, primary_sf, primary_acre, unusable_sf, unusable_acre, unusable_desc, surplus_sf, surplus_acre, surplus_desc, excess_sf, excess_acre, excess_desc, net_usable_sf, net_usable_acre, net_usable_desc, shape, topography, site_access, orientation, exposure, frontage, depth, utilities, flood_plain, easement, easement_desc, zoning_code, zoning_juris, zoning_desc, zoning_overlay, zoning_overlay_desc, zoning_details, max_building_ht, floor_area_ratio, max_floor_area,  traffic_count, side_street, inter_street, traffic_date, distance_direction) VALUES (:FK_ReportID, :photo1, :thumbnail, :property_name, :address, :streetnumber, :streetname, :city, :county, :state, :zip_code, :lat, :lng, :propertytype, :propertysubtype, :msa, :genmarket, :submarkid, :legal_desc, :owner_type, :owner_name, :gla_inputtype, :gla_inputsize, :gross_land_sf, :gross_land_acre, :primary_sf, :primary_acre, :unusable_sf, :unusable_acre, :unusable_desc, :surplus_sf, :surplus_acre, :surplus_desc, :excess_sf, :excess_acre, :excess_desc, :net_usable_sf, :net_usable_acre, :net_usable_desc, :shape, :topography, :site_access, :orientation, :exposure, :frontage, :depth, :utilities, :flood_plain, :easement, :easement_desc, :zoning_code, :zoning_juris, :zoning_desc, :zoning_overlay, :zoning_overlay_desc, :zoning_details, :max_building_ht, :floor_area_ratio, :max_floor_area, :traffic_count, :side_street, :inter_street, :traffic_date, :distance_direction)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".PROPERTY_TABLE." SET property_name=:property_name, photo1=:photo1, thumbnail=:thumbnail, address=:address, streetnumber=:streetnumber, streetname=:streetname, city=:city, county=:county, state=:state, zip_code=:zip_code, lat=:lat, lng=:lng, propertytype=:propertytype, propertysubtype=:propertysubtype, msa=:msa, genmarket=:genmarket, submarkid=:submarkid, legal_desc=:legal_desc, owner_type=:owner_type, owner_name=:owner_name, gla_inputtype=:gla_inputtype, gla_inputsize=:gla_inputsize, gross_land_sf=:gross_land_sf, gross_land_acre=:gross_land_acre, primary_sf=:primary_sf, primary_acre=:primary_acre, unusable_sf=:unusable_sf, unusable_acre=:unusable_acre, unusable_desc=:unusable_desc, surplus_sf=:surplus_sf, surplus_acre=:surplus_acre, surplus_desc=:surplus_desc, excess_sf=:excess_sf, excess_acre=:excess_acre, excess_desc=:excess_desc, net_usable_sf=:net_usable_sf, net_usable_acre=:net_usable_acre, net_usable_desc=:net_usable_desc, shape=:shape, topography=:topography, site_access=:site_access, orientation=:orientation, exposure=:exposure, frontage=:frontage, depth=:depth, utilities=:utilities, flood_plain=:flood_plain, easement=:easement, easement_desc=:easement_desc, zoning_code=:zoning_code, zoning_juris=:zoning_juris, zoning_desc=:zoning_desc, zoning_overlay=:zoning_overlay, zoning_overlay_desc=:zoning_overlay_desc, zoning_details=:zoning_details, max_building_ht=:max_building_ht, floor_area_ratio=:floor_area_ratio, max_floor_area=:max_floor_area, traffic_count=:traffic_count, side_street=:side_street, inter_street=:inter_street, traffic_date=:traffic_date, distance_direction=:distance_direction WHERE ".PROPERTY_TABLE.".FK_ReportID=:FK_ReportID");
            }

            $stmt->bindValue(':photo1',$appraisals->getPhoto1(),PDO::PARAM_STR);
            $stmt->bindValue(':thumbnail',$appraisals->getThumbnail(),PDO::PARAM_STR);
            $stmt->bindValue(':property_name',$appraisals->getProperty_name(),PDO::PARAM_STR);
            $stmt->bindValue(':address',$appraisals->getAddress(),PDO::PARAM_STR);
            $stmt->bindValue(':streetnumber',$appraisals->getStreetnumber(),PDO::PARAM_STR);
            $stmt->bindValue(':streetname',$appraisals->getStreetname(),PDO::PARAM_STR);
            $stmt->bindValue(':city',$appraisals->getCity(),PDO::PARAM_STR);
            $stmt->bindValue(':county',$appraisals->getCounty(),PDO::PARAM_STR);
            $stmt->bindValue(':state',$appraisals->getState(),PDO::PARAM_STR);
            $stmt->bindValue(':zip_code',$appraisals->getZip_code(),PDO::PARAM_STR);
            $stmt->bindValue(':lat',$appraisals->getLat(),PDO::PARAM_STR);
            $stmt->bindValue(':lng',$appraisals->getLng(),PDO::PARAM_STR);
            $stmt->bindValue(':propertytype',$appraisals->getPropertytype(),PDO::PARAM_INT);
            $stmt->bindValue(':propertysubtype',$appraisals->getPropertysubtype(),PDO::PARAM_STR);
            $stmt->bindValue(':msa',$appraisals->getMsa(),PDO::PARAM_STR);
            $stmt->bindValue(':genmarket',$appraisals->getGenmarket(),PDO::PARAM_INT);
            $stmt->bindValue(':submarkid',$appraisals->getSubmarkid(),PDO::PARAM_STR);
            $stmt->bindValue(':legal_desc',$appraisals->getLegal_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':owner_type',$appraisals->getOwner_type(),PDO::PARAM_STR);
            $stmt->bindValue(':owner_name',$appraisals->getOwner_name(),PDO::PARAM_STR);
            $stmt->bindValue(':gla_inputtype',$appraisals->getGla_inputtype(),PDO::PARAM_INT);
            $stmt->bindValue(':gla_inputsize',$appraisals->getGla_inputsize(),PDO::PARAM_STR);
            $stmt->bindValue(':gross_land_sf',$appraisals->getGross_land_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':gross_land_acre',$appraisals->getGross_land_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':primary_sf',$appraisals->getPrimary_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':primary_acre',$appraisals->getPrimary_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':unusable_sf',$appraisals->getUnusable_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':unusable_acre',$appraisals->getUnusable_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':unusable_desc',$appraisals->getUnusable_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':surplus_sf',$appraisals->getSurplus_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':surplus_acre',$appraisals->getSurplus_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':surplus_desc',$appraisals->getSurplus_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':excess_sf',$appraisals->getExcess_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':excess_acre',$appraisals->getExcess_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':excess_desc',$appraisals->getExcess_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':net_usable_sf',$appraisals->getNet_usable_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':net_usable_acre',$appraisals->getNet_usable_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':net_usable_desc',$appraisals->getNet_usable_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':shape',$appraisals->getShape(),PDO::PARAM_INT);
            $stmt->bindValue(':topography',$appraisals->getTopography(),PDO::PARAM_INT);
            $stmt->bindValue(':site_access',$appraisals->getSite_access(),PDO::PARAM_INT);
            $stmt->bindValue(':orientation',$appraisals->getOrientation(),PDO::PARAM_INT);
            $stmt->bindValue(':exposure',$appraisals->getExposure(),PDO::PARAM_INT);
            $stmt->bindValue(':frontage',$appraisals->getFrontage(),PDO::PARAM_STR);
            $stmt->bindValue(':depth',$appraisals->getDepth(),PDO::PARAM_STR);
            $stmt->bindValue(':utilities',$appraisals->getUtilities(),PDO::PARAM_INT);
            $stmt->bindValue(':flood_plain',$appraisals->getFlood_plain(),PDO::PARAM_INT);
            $stmt->bindValue(':easement',$appraisals->getEasement(),PDO::PARAM_INT);
            $stmt->bindValue(':easement_desc',$appraisals->getEasement_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':zoning_code',$appraisals->getZoning_code(),PDO::PARAM_STR);
            $stmt->bindValue(':zoning_juris',$appraisals->getZoning_juris(),PDO::PARAM_STR);
            $stmt->bindValue(':zoning_desc',$appraisals->getZoning_desc(),PDO::PARAM_STR);            
            $stmt->bindValue(':zoning_overlay',$appraisals->getZoning_overlay(),PDO::PARAM_STR);
            $stmt->bindValue(':zoning_overlay_desc',$appraisals->getZoning_overlay_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':zoning_details',$appraisals->getZoning_details(),PDO::PARAM_STR);
            $stmt->bindValue(':max_building_ht',$appraisals->getMax_building_ht(),PDO::PARAM_STR);
            $stmt->bindValue(':floor_area_ratio',$appraisals->getFloor_area_ratio(),PDO::PARAM_INT);
            $stmt->bindValue(':max_floor_area',$appraisals->getMax_floor_area(),PDO::PARAM_INT);
            $stmt->bindValue(':traffic_count',$appraisals->getTraffic_count(),PDO::PARAM_STR);
            $stmt->bindValue(':side_street',$appraisals->getSide_street(),PDO::PARAM_INT);
            $stmt->bindValue(':inter_street',$appraisals->getInter_street(),PDO::PARAM_STR);
            $stmt->bindValue(':traffic_date',$appraisals->getTraffic_date(),PDO::PARAM_STR);
            $stmt->bindValue(':distance_direction',$appraisals->getDistance_direction(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$appraisals->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
        
           if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".BUILDING_TABLE." (FK_ReportID, no_building, no_stories, floor_1_gba, floor_2_gba, total_basement_gba, basement_pct_gba, overall_gba, gba_source, floor_1_nra, floor_2_nra, total_basement_nra, basement_pct_nra, overall_nra, nra_source, eff_ratio_pct_nra, land_build_ratio_primary, site_cover_primary, land_build_ratio_overall, site_cover_overall, basement_type, storage_basement_sf, ancillary_area_sf, ancillary_area_desc, parking_stalls, parking_type, parking_ratio_nra, parking_ratio_unit, parking_ratio, parking_ratio_gba, building_comments, year_built, year_built_search, last_renovation, no_units, no_tenants, occupancy_type, building_quality, building_class, int_condition, ext_condition, const_class, const_descr, other_const_features) VALUES (:FK_ReportID, :no_building, :no_stories, :floor_1_gba, :floor_2_gba, :total_basement_gba, :basement_pct_gba, :overall_gba, :gba_source, :floor_1_nra, :floor_2_nra, :total_basement_nra, :basement_pct_nra, :overall_nra, :nra_source, :eff_ratio_pct_nra, :land_build_ratio_primary, :site_cover_primary, :land_build_ratio_overall, :site_cover_overall, :basement_type, :storage_basement_sf, :ancillary_area_sf, :ancillary_area_desc, :parking_stalls, :parking_type, :parking_ratio_nra, :parking_ratio_unit, :parking_ratio, :parking_ratio_gba, :building_comments, :year_built, :year_built_search, :last_renovation, :no_units, :no_tenants, :occupancy_type, :building_quality, :building_class, :int_condition, :ext_condition, :const_class, :const_descr, :other_const_features)");
                
            }else{
                $stmt = $this->db->prepare("UPDATE ".BUILDING_TABLE." SET no_building=:no_building, no_stories=:no_stories, floor_1_gba=:floor_1_gba, floor_2_gba=:floor_2_gba, total_basement_gba=:total_basement_gba, basement_pct_gba=:basement_pct_gba, overall_gba=:overall_gba, gba_source=:gba_source, floor_1_nra=:floor_1_nra, floor_2_nra=:floor_2_nra, total_basement_nra=:total_basement_nra, basement_pct_nra=:basement_pct_nra, overall_nra=:overall_nra, nra_source=:nra_source, eff_ratio_pct_nra=:eff_ratio_pct_nra, land_build_ratio_primary=:land_build_ratio_primary, site_cover_primary=:site_cover_primary, land_build_ratio_overall=:land_build_ratio_overall, site_cover_overall=:site_cover_overall, basement_type=:basement_type, storage_basement_sf=:storage_basement_sf, ancillary_area_sf=:ancillary_area_sf, ancillary_area_desc=:ancillary_area_desc, parking_stalls=:parking_stalls, parking_type=:parking_type, parking_ratio_nra=:parking_ratio_nra, parking_ratio_unit=:parking_ratio_unit, parking_ratio=:parking_ratio, parking_ratio_gba=:parking_ratio_gba, building_comments=:building_comments, year_built=:year_built, year_built_search=:year_built_search, last_renovation=:last_renovation, no_units=:no_units, no_tenants=:no_tenants, occupancy_type=:occupancy_type, building_quality=:building_quality, building_class=:building_class, int_condition=:int_condition, ext_condition=:ext_condition, const_class=:const_class, const_descr=:const_descr, other_const_features=:other_const_features WHERE ".BUILDING_TABLE.".FK_ReportID=:FK_ReportID");
            }
        
            $stmt->bindValue(':no_building',$appraisals->getNo_building(),PDO::PARAM_INT);
            $stmt->bindValue(':no_stories',$appraisals->getNo_stories(),PDO::PARAM_STR);
            $stmt->bindValue(':floor_1_gba',$appraisals->getFloor_1_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':floor_2_gba',$appraisals->getFloor_2_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':total_basement_gba',$appraisals->getTotal_basement_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':basement_pct_gba',$appraisals->getBasement_pct_gba(),PDO::PARAM_STR);
            $stmt->bindValue(':overall_gba',$appraisals->getOverall_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':gba_source',$appraisals->getGba_source(),PDO::PARAM_STR);
            $stmt->bindValue(':floor_1_nra',$appraisals->getFloor_1_nra(),PDO::PARAM_INT);
            $stmt->bindValue(':floor_2_nra',$appraisals->getFloor_2_nra(),PDO::PARAM_INT);
            $stmt->bindValue(':total_basement_nra',$appraisals->getTotal_basement_nra(),PDO::PARAM_INT);
            $stmt->bindValue(':basement_pct_nra',$appraisals->getBasement_pct_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':overall_nra',$appraisals->getOverall_nra(),PDO::PARAM_INT);
            $stmt->bindValue(':nra_source',$appraisals->getNra_source(),PDO::PARAM_STR);
            $stmt->bindValue(':basement_type',$appraisals->getBasement_type(),PDO::PARAM_STR);
            $stmt->bindValue(':storage_basement_sf',$appraisals->getStorage_basement_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':ancillary_area_sf',$appraisals->getAncillary_area_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':ancillary_area_desc',$appraisals->getAncillary_area_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':parking_stalls',$appraisals->getParking_stalls(),PDO::PARAM_INT);
            $stmt->bindValue(':parking_type',$appraisals->getParking_type(),PDO::PARAM_INT);
            $stmt->bindValue(':parking_ratio_nra',$appraisals->getParking_ratio_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':parking_ratio_unit',$appraisals->getParking_ratio_unit(),PDO::PARAM_STR);
            $stmt->bindValue(':parking_ratio',$appraisals->getParking_ratio(),PDO::PARAM_STR);
            $stmt->bindValue(':parking_ratio_gba',$appraisals->getParking_ratio_gba(),PDO::PARAM_STR);
            $stmt->bindValue(':land_build_ratio_overall',$appraisals->getLand_build_ratio_overall(),PDO::PARAM_STR);
            $stmt->bindValue(':land_build_ratio_primary',$appraisals->getLand_build_ratio_primary(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_ratio_pct_nra',$appraisals->getEff_ratio_pct_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':site_cover_overall',$appraisals->getSite_cover_overall(),PDO::PARAM_STR);
            $stmt->bindValue(':site_cover_primary',$appraisals->getSite_cover_primary(),PDO::PARAM_STR);
            $stmt->bindValue(':building_comments',$appraisals->getBuilding_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':year_built_search',$appraisals->getYear_built_search(),PDO::PARAM_STR);
            $stmt->bindValue(':last_renovation',$appraisals->getLast_renovation(),PDO::PARAM_STR);
            $stmt->bindValue(':year_built',$appraisals->getYear_built(),PDO::PARAM_STR);            
            $stmt->bindValue(':no_units',$appraisals->getNo_units(),PDO::PARAM_INT);
            $stmt->bindValue(':no_tenants',$appraisals->getNo_tenants(),PDO::PARAM_INT);            
            $stmt->bindValue(':occupancy_type',$appraisals->getOccupancy_type(),PDO::PARAM_INT);
            $stmt->bindValue(':building_quality',$appraisals->getBuilding_quality(),PDO::PARAM_INT);
            $stmt->bindValue(':int_condition',$appraisals->getInt_condition(),PDO::PARAM_INT);
            $stmt->bindValue(':ext_condition',$appraisals->getExt_condition(),PDO::PARAM_INT);
            $stmt->bindValue(':const_class',$appraisals->getConst_class(),PDO::PARAM_INT);
            $stmt->bindValue(':building_class',$appraisals->getBuilding_class(),PDO::PARAM_INT);
            $stmt->bindValue(':const_descr',$appraisals->getConst_descr(),PDO::PARAM_STR);
            $stmt->bindValue(':other_const_features',$appraisals->getOther_const_features(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$appraisals->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
            

            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".SALES_TRANSACTIONS_TABLE." (FK_ReportID, list_price, record_date, sale_status, sale_comments, grantor, grantee) VALUES (:FK_ReportID, :list_price, :record_date, :sale_status, :sale_comments, :grantor, :grantee)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".SALES_TRANSACTIONS_TABLE." SET list_price=:list_price, record_date=:record_date, sale_status=:sale_status, sale_comments=:sale_comments, grantor=:grantor, grantee=:grantee WHERE ".SALES_TRANSACTIONS_TABLE.".FK_ReportID=:FK_ReportID");
            }
        
            
            $stmt->bindValue(':list_price',$appraisals->getList_price(),PDO::PARAM_INT);
            $stmt->bindValue(':record_date',$appraisals->getRecord_date(),PDO::PARAM_STR);
            $stmt->bindValue(':sale_status',$appraisals->getSale_status(),PDO::PARAM_INT);
            $stmt->bindValue(':sale_comments',$appraisals->getSale_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':grantor',$appraisals->getGrantor(),PDO::PARAM_STR);
            $stmt->bindValue(':grantee',$appraisals->getGrantee(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$appraisals->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".PROPERTYTYPE_DETAILS_TABLE." (FK_ReportID, off_fire_sprinkler, off_type_hvac, off_elevator_service, shop_total_gba, shop_inline_sf, 
                    shop_anchor_tenant, shop_achor_space_inc, shop_anchor_sf, shop_total_nra, shop_inline_pct, shop_other_tenant, shop_anchor_pct, store_canopy, store_no_fuel, store_chain_affil, 
                    store_avg_month_gallon, store_month_store_sales, store_month_car_wash_sales, store_month_mini_sales, store_canopy_desc, store_fuel_desc, store_co_chain_affil, 
                    store_total_month_sales, veh_level, veh_tunnel, veh_showroom_pct, veh_showroom_sf, veh_service_sf, rest_no_seats, rest_drive_thru, rest_alcohol, rest_playground, 
                    ind_int_office_1, ind_int_office_2, ind_total_office, ind_clear_height, ind_bay_dimension, ind_storage_mezz_sf, ind_truck_grade, ind_truck_dock, ind_hvac, ind_ext_office_1, 
                    ind_ext_office_2, ind_pct_office, ind_column_spacing, ind_storage_mess, ind_mezz_desc, ind_rail, ind_no_rail, ind_fire, ss_code_access, ss_alarm, ss_heat, ss_security, 
                    ss_boat, ss_on_site, ss_residence, ss_residence_desc) VALUES (:FK_ReportID, :off_fire_sprinkler, :off_type_hvac, :off_elevator_service, :shop_total_gba, :shop_inline_sf, 
                    :shop_anchor_tenant, :shop_achor_space_inc, :shop_anchor_sf, :shop_total_nra, :shop_inline_pct, :shop_other_tenant, :shop_anchor_pct, :store_canopy, :store_no_fuel, 
                    :store_chain_affil, :store_avg_month_gallon, :store_month_store_sales, :store_month_car_wash_sales, :store_month_mini_sales, :store_canopy_desc, :store_fuel_desc, 
                    :store_co_chain_affil, :store_total_month_sales, :veh_level, :veh_tunnel, :veh_showroom_pct, :veh_showroom_sf, :veh_service_sf, :rest_no_seats, :rest_drive_thru, 
                    :rest_alcohol, :rest_playground, :ind_int_office_1, :ind_int_office_2, :ind_total_office, :ind_clear_height, :ind_bay_dimension, :ind_storage_mezz_sf, :ind_truck_grade, 
                    :ind_truck_dock, :ind_hvac, :ind_ext_office_1, :ind_ext_office_2, :ind_pct_office, :ind_column_spacing, :ind_storage_mess, :ind_mezz_desc, :ind_rail, :ind_no_rail, 
                    :ind_fire, :ss_code_access, :ss_alarm, :ss_heat, :ss_security, :ss_boat, :ss_on_site, :ss_residence, :ss_residence_desc)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".PROPERTYTYPE_DETAILS_TABLE." SET off_fire_sprinkler=:off_fire_sprinkler, off_type_hvac=:off_type_hvac, 
                    off_elevator_service=:off_elevator_service, shop_total_gba=:shop_total_gba, shop_inline_sf=:shop_inline_sf, shop_anchor_tenant=:shop_anchor_tenant, 
                    shop_achor_space_inc=:shop_achor_space_inc, shop_anchor_sf=:shop_anchor_sf, shop_total_nra=:shop_total_nra, shop_inline_pct=:shop_inline_pct, 
                    shop_other_tenant=:shop_other_tenant, shop_anchor_pct=:shop_anchor_pct, store_canopy=:store_canopy, store_no_fuel=:store_no_fuel, store_chain_affil=:store_chain_affil, 
                    store_avg_month_gallon=:store_avg_month_gallon, store_month_store_sales=:store_month_store_sales, store_month_car_wash_sales=:store_month_car_wash_sales, 
                    store_month_mini_sales=:store_month_mini_sales, store_canopy_desc=:store_canopy_desc, store_fuel_desc=:store_fuel_desc, store_co_chain_affil=:store_co_chain_affil, 
                    store_total_month_sales=:store_total_month_sales, veh_level=:veh_level, veh_tunnel=:veh_tunnel, veh_showroom_pct=:veh_showroom_pct, veh_showroom_sf=:veh_showroom_sf, 
                    veh_service_sf=:veh_service_sf, rest_no_seats=:rest_no_seats, rest_drive_thru=:rest_drive_thru, rest_alcohol=:rest_alcohol, rest_playground=:rest_playground, 
                    ind_int_office_1=:ind_int_office_1, ind_int_office_2=:ind_int_office_2, ind_total_office=:ind_total_office, ind_clear_height=:ind_clear_height, 
                    ind_bay_dimension=:ind_bay_dimension, ind_storage_mezz_sf=:ind_storage_mezz_sf, ind_truck_grade=:ind_truck_grade, ind_truck_dock=:ind_truck_dock, ind_hvac=:ind_hvac, 
                    ind_ext_office_1=:ind_ext_office_1, ind_ext_office_2=:ind_ext_office_2, ind_pct_office=:ind_pct_office, ind_column_spacing=:ind_column_spacing, 
                    ind_storage_mess=:ind_storage_mess, ind_mezz_desc=:ind_mezz_desc, ind_rail=:ind_rail, ind_no_rail=:ind_no_rail, ind_fire=:ind_fire, ss_code_access=:ss_code_access, 
                    ss_alarm=:ss_alarm, ss_heat=:ss_heat, ss_security=:ss_security, ss_boat=:ss_boat, ss_on_site=:ss_on_site, ss_residence=:ss_residence, ss_residence_desc=:ss_residence_desc
                    WHERE ".PROPERTYTYPE_DETAILS_TABLE.".FK_ReportID=:FK_ReportID");
            }
            
            
            $stmt->bindValue(':off_fire_sprinkler',$appraisals->getOff_fire_sprinkler(),PDO::PARAM_INT);
            $stmt->bindValue(':off_type_hvac',$appraisals->getOff_type_hvac(),PDO::PARAM_STR);
            $stmt->bindValue(':off_elevator_service',$appraisals->getOff_elevator_service(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_total_gba',$appraisals->getShop_total_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_inline_sf',$appraisals->getShop_inline_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_anchor_tenant',$appraisals->getShop_anchor_tenant(),PDO::PARAM_STR);
            $stmt->bindValue(':shop_achor_space_inc',$appraisals->getShop_achor_space_inc(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_anchor_sf',$appraisals->getShop_anchor_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_total_nra',$appraisals->getShop_total_nra(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_inline_pct',$appraisals->getShop_inline_pct(),PDO::PARAM_STR);
            $stmt->bindValue(':shop_other_tenant',$appraisals->getShop_other_tenant(),PDO::PARAM_STR);
            $stmt->bindValue(':shop_anchor_pct',$appraisals->getShop_anchor_pct(),PDO::PARAM_STR);
            $stmt->bindValue(':store_canopy',$appraisals->getStore_canopy(),PDO::PARAM_INT);
            $stmt->bindValue(':store_no_fuel',$appraisals->getStore_no_fuel(),PDO::PARAM_INT);
            $stmt->bindValue(':store_chain_affil',$appraisals->getStore_chain_affil(),PDO::PARAM_STR);
            $stmt->bindValue(':store_avg_month_gallon',$appraisals->getStore_avg_month_gallon(),PDO::PARAM_INT);
            $stmt->bindValue(':store_month_store_sales',$appraisals->getStore_month_store_sales(),PDO::PARAM_INT);
            $stmt->bindValue(':store_month_car_wash_sales',$appraisals->getStore_month_car_wash_sales(),PDO::PARAM_INT);
            $stmt->bindValue(':store_month_mini_sales',$appraisals->getStore_month_mini_sales(),PDO::PARAM_INT);
            $stmt->bindValue(':store_canopy_desc',$appraisals->getStore_canopy_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':store_fuel_desc',$appraisals->getStore_fuel_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':store_co_chain_affil',$appraisals->getStore_co_chain_affil(),PDO::PARAM_STR);
            $stmt->bindValue(':store_total_month_sales',$appraisals->getStore_total_month_sales(),PDO::PARAM_INT);
            $stmt->bindValue(':veh_level',$appraisals->getVeh_level(),PDO::PARAM_INT);
            $stmt->bindValue(':veh_tunnel',$appraisals->getVeh_tunnel(),PDO::PARAM_INT);
            $stmt->bindValue(':veh_showroom_pct',$appraisals->getVeh_showroom_pct(),PDO::PARAM_STR);
            $stmt->bindValue(':veh_showroom_sf',$appraisals->getVeh_showroom_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':veh_service_sf',$appraisals->getVeh_service_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':rest_no_seats',$appraisals->getRest_no_seats(),PDO::PARAM_STR);
            $stmt->bindValue(':rest_drive_thru',$appraisals->getRest_drive_thru(),PDO::PARAM_INT);
            $stmt->bindValue(':rest_alcohol',$appraisals->getRest_alcohol(),PDO::PARAM_INT);
            $stmt->bindValue(':rest_playground',$appraisals->getRest_playground(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_int_office_1',$appraisals->getInd_int_office_1(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_int_office_2',$appraisals->getInd_int_office_2(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_total_office',$appraisals->getInd_total_office(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_clear_height',$appraisals->getInd_clear_height(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_bay_dimension',$appraisals->getInd_bay_dimension(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_storage_mezz_sf',$appraisals->getInd_storage_mezz_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_truck_grade',$appraisals->getInd_truck_grade(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_truck_dock',$appraisals->getInd_truck_dock(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_hvac',$appraisals->getInd_hvac(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_ext_office_1',$appraisals->getInd_ext_office_1(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_ext_office_2',$appraisals->getInd_ext_office_2(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_pct_office',$appraisals->getInd_pct_office(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_column_spacing',$appraisals->getInd_column_spacing(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_storage_mess',$appraisals->getInd_storage_mess(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_mezz_desc',$appraisals->getInd_mezz_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_rail',$appraisals->getInd_rail(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_no_rail',$appraisals->getInd_no_rail(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_fire',$appraisals->getInd_fire(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_code_access',$appraisals->getSs_code_access(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_alarm',$appraisals->getSs_alarm(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_heat',$appraisals->getSs_heat(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_security',$appraisals->getSs_security(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_boat',$appraisals->getSs_boat(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_on_site',$appraisals->getSs_on_site(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_residence',$appraisals->getSs_residence(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_residence_desc',$appraisals->getSs_residence_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$appraisals->getId(),PDO::PARAM_INT);
            
            $stmt->execute();
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".MULTIFAMILY_TABLE." (FK_ReportID, mf_no_single, mf_sw_low_rent, mf_sw_high_rent, mf_sw_avg_rent, mf_no_double, mf_dw_low_rent, mf_dw_high_rent, mf_dw_avg_rent, mf_no_triple, mf_tw_low_rent, mf_tw_high_rent, mf_tw_avg_rent, mf_no_rv_spaces, mf_rv_low_rent, mf_rv_high_rent, mf_rv_avg_rent, mf_high_rent, mf_total_spaces, mf_total_avg_rent) VALUES (:FK_ReportID,:mf_no_single,:mf_sw_low_rent,:mf_sw_high_rent,:mf_sw_avg_rent,:mf_no_double,:mf_dw_low_rent,:mf_dw_high_rent,:mf_dw_avg_rent,:mf_no_triple,:mf_tw_low_rent,:mf_tw_high_rent,:mf_tw_avg_rent,:mf_no_rv_spaces,:mf_rv_low_rent,:mf_rv_high_rent,:mf_rv_avg_rent,:mf_high_rent,:mf_total_spaces,:mf_total_avg_rent)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".MULTIFAMILY_TABLE." SET mf_no_single=:mf_no_single, mf_sw_low_rent=:mf_sw_low_rent, mf_sw_high_rent=:mf_sw_high_rent, mf_sw_avg_rent=:mf_sw_avg_rent, mf_no_double=:mf_no_double, mf_dw_low_rent=:mf_dw_low_rent, mf_dw_high_rent=:mf_dw_high_rent, mf_dw_avg_rent=:mf_dw_avg_rent, mf_no_triple=:mf_no_triple, mf_tw_low_rent=:mf_tw_low_rent, mf_tw_high_rent=:mf_tw_high_rent, mf_tw_avg_rent=:mf_tw_avg_rent, mf_no_rv_spaces=:mf_no_rv_spaces, mf_rv_low_rent=:mf_rv_low_rent, mf_rv_high_rent=:mf_rv_high_rent, mf_rv_avg_rent=:mf_rv_avg_rent, mf_high_rent=:mf_high_rent, mf_total_spaces=:mf_total_spaces, mf_total_avg_rent=:mf_total_avg_rent WHERE ".MULTIFAMILY_TABLE.".FK_ReportID=:FK_ReportID");
            }
                        
            $stmt->bindValue(':mf_no_single',$appraisals->getMf_no_single(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_sw_low_rent',$appraisals->getMf_sw_low_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_sw_high_rent',$appraisals->getMf_sw_high_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_sw_avg_rent',$appraisals->getMf_sw_avg_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_no_double',$appraisals->getMf_no_double(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_dw_low_rent',$appraisals->getMf_dw_low_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_dw_high_rent',$appraisals->getMf_dw_high_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_dw_avg_rent',$appraisals->getMf_dw_avg_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_no_triple',$appraisals->getMf_no_triple(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_tw_low_rent',$appraisals->getMf_tw_low_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_tw_high_rent',$appraisals->getMf_tw_high_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_tw_avg_rent',$appraisals->getMf_tw_avg_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_no_rv_spaces',$appraisals->getMf_no_rv_spaces(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_rv_low_rent',$appraisals->getMf_rv_low_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_rv_high_rent',$appraisals->getMf_rv_high_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_rv_avg_rent',$appraisals->getMf_rv_avg_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_high_rent',$appraisals->getMf_high_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_total_spaces',$appraisals->getMf_total_spaces(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_total_avg_rent',$appraisals->getMf_total_avg_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$appraisals->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
            
            $allAssessed = array();
			if(isset($_POST['assessedids'])){
				if(stristr($_POST['assessedids'],",")!==false){
					$allAssessed = explode(",",$_POST['assessedids']);
				}else{
					$allAssessed[] = $_POST['assessedids'];
				}
			}
			
			$assessedvalues = $appraisals->getAssessedvalues();
			for($p=0;$p<count($assessedvalues);$p++){
				if($assessedvalues[$p]->getId()!=0){
					$stmt = $this->db->prepare("UPDATE ".ASSESSED_TABLE." SET mappage=:mappage_".$p.", taxlot=:taxlot_".$p.", parcelno=:parcelno_".$p.", assessedglasf=:assessedglasf_".$p.", marketland=:marketland_".$p.", marketimp=:marketimp_".$p.", markettotal=:markettotal_".$p.", measure50=:measure50_".$p.", annualtaxes=:annualtaxes_".$p." WHERE ".ASSESSED_TABLE.".FK_ReportID=:FK_ReportID AND ".ASSESSED_TABLE.".id=:id_".$p."");
					$stmt->bindValue(':id_'.$p,$assessedvalues[$p]->getId(),PDO::PARAM_INT);
				}else{
					$stmt = $this->db->prepare("INSERT INTO ".ASSESSED_TABLE." (FK_ReportID,mappage,taxlot,parcelno,assessedglasf,marketland,marketimp,markettotal,measure50,annualtaxes) VALUES (:FK_ReportID,:mappage_".$p.",:taxlot_".$p.",:parcelno_".$p.",:assessedglasf_".$p.",:marketland_".$p.",:marketimp_".$p.",:markettotal_".$p.",:measure50_".$p.",:annualtaxes_".$p.")");
				}

				$stmt->bindValue(':mappage_'.$p,$assessedvalues[$p]->getMappage(),PDO::PARAM_STR);
				$stmt->bindValue(':taxlot_'.$p,$assessedvalues[$p]->getTaxlot(),PDO::PARAM_STR);
				$stmt->bindValue(':parcelno_'.$p,$assessedvalues[$p]->getParcelno(),PDO::PARAM_STR);
				$stmt->bindValue(':assessedglasf_'.$p,$assessedvalues[$p]->getAssessedglasf(),PDO::PARAM_INT);
				$stmt->bindValue(':marketland_'.$p,$assessedvalues[$p]->getMarketland(),PDO::PARAM_INT);
				$stmt->bindValue(':marketimp_'.$p,$assessedvalues[$p]->getMarketimp(),PDO::PARAM_INT);
				$stmt->bindValue(':markettotal_'.$p,$assessedvalues[$p]->getMarkettotal(),PDO::PARAM_INT);
				$stmt->bindValue(':measure50_'.$p,$assessedvalues[$p]->getMeasure50(),PDO::PARAM_INT);
				$stmt->bindValue(':annualtaxes_'.$p,$assessedvalues[$p]->getAnnualtaxes(),PDO::PARAM_STR);
				$stmt->bindValue(':FK_ReportID',$appraisals->getId(),PDO::PARAM_INT);

				$stmt->execute();
				$index = array_search($assessedvalues[$p]->getId(),$allAssessed);
				if($index!==false){
					array_splice($allAssessed,$index,1);
				}
			}
			
			for($p=0;$p<count($allAssessed);$p++){
				$stmt = $this->db->prepare("DELETE FROM ".ASSESSED_TABLE." WHERE ".ASSESSED_TABLE.".id=:id_".$p."");
				$stmt->bindValue(':id_'.$p,$allAssessed[$p],PDO::PARAM_INT);
				$stmt->execute();
			}
            $directory = "../comp_images/".$appraisals->getId();
            if (!is_dir($directory)){
                mkdir($directory, 0755, true);
            }

            $images = array();
/*            foreach ($_FILES['images']['name'] as $key => $val ) {
                $file_name = explode(".", $_FILES['images']['name'][$key]);
                $file_name = round(microtime(true)) . '.' . end($file_name)[$key];
                $file_name = str_replace(' ','-',$file_name, $key);
		        $upload_dir = "../comp_images/" . $appraisals->getId() . "/";
		        $upload_image = $upload_dir.$file_name[$key];
                if (move_uploaded_file($file_name[$key],$upload_image)) {
                    $images[] = $upload_image;
                    $FK_ReportID = $appraisals->getId();
                        if (!empty($images)){                       
                            $caption = $_POST['caption'][$key];
							// insert uploaded images details into MySQL database.
							$stmt = $this->db->prepare("INSERT INTO propphotos (photopath, FK_ReportID, caption) VALUES('" . $file_name . "', '" . $FK_ReportID . "', '" . $caption . "')");
							$stmt->execute(); 
                        }
                }
            }*/
            foreach ($_FILES['images']['name'] as $key => $val ) {
                $upload_dir = "../comp_images/" . $appraisals->getId() . "/";
                $upload_image = $upload_dir.$_FILES['images']['name'][$key];
                $file_name = $_FILES['images']['name'][$key];
                if (move_uploaded_file($_FILES['images']['tmp_name'][$key],$upload_image)) {
                    $images[] = $upload_image;
                    $FK_ReportID = $appraisals->getId();
                        if (!empty($images)){                       
                            $caption = $_POST['caption'][$key];
							// insert uploaded images details into MySQL database.
							$stmt = $this->db->prepare("INSERT INTO propphotos (photopath, FK_ReportID, caption) VALUES('" . $file_name . "', '" . $FK_ReportID . "', '" . $caption . "')");
							$stmt->execute(); 
                        }
                }
            }
			$picOrder = explode(",",$_POST['picorder']);
			for($p=0;$p<count($picOrder);$p++){
				$FK_ReportID = $appraisals->getId();
				$stmt = $this->db->prepare("UPDATE propphotos SET propphotos.order = '".($p+1)."' WHERE FK_ReportID = '".$FK_ReportID."' AND photopath='".$picOrder[$p]."'");
				$stmt->execute(); 
			}
			//
            $this->db->commit();
        }catch (PDOException $e) {
            print_r($e);
            $this->db->rollBack(); //cancel db changes if something goes wrong
            //return $appraisals;
            die();
        }
        
        return $appraisals;
    }
}
?>