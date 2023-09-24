<?php
class landSalesDBController{
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
    
    public function getLinks($id){
        $sql = "SELECT * FROM ".DOC_LINKS." WHERE ".DOC_LINKS.".FK_ReportID=:id" ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function getTableRecord($id){

        $sql_fields[] = REPORT_TABLE.".id";
        
		$sql_fields[] = "if(".PROPERTY_TABLE.".thumbnail = '', 'no-photo-tn.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".thumbnail)) as thumbnail";
        $sql_fields[] = "if(".PROPERTY_TABLE.".photo1 = '', 'no-photo.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) as photo1";
        $sql_fields[] = PROPERTY_TABLE.".property_name";
        $sql_fields[] = PROPERTY_TABLE.".lat";
        $sql_fields[] = PROPERTY_TABLE.".lng";
        $sql_fields[] = "CONCAT(".PROPERTY_TABLE.".streetnumber,' ',".PROPERTY_TABLE.".streetname) AS address";
        $sql_fields[] = PROPERTY_TABLE.".city";
        $sql_fields[] = PROPERTY_TABLE.".zoning_code";
        
        $sql_fields[] = SUBMARKET_TABLE.".submarket";
        
        $sql_fields[] = PROPERTYTYPE_TABLE.".propertytype";
        
        $sql_fields[] = PROPERTYSUBTYPE_TABLE.".subtype";
//
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_sf,0) AS net_usable_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_acre,3) AS net_usable_acre";
        
        $sql_fields[] = "DATE_FORMAT(".SALES_TRANSACTIONS_TABLE.".record_date,'%c/%e/%Y') AS record_date";
        $sql_fields[] = "IF(".SALES_TRANSACTIONS_TABLE.".sale_status=3,'',".WFDICTIONARY_TABLE.".definition) AS sale_status";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_net,2)) AS adj_price_sf_net";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_far,2)) AS adj_price_sf_far";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_acre_net,0)) AS adj_price_acre_net";
        
        $sql_fields[] = LAND_TABLE.".finish_lot_size_sf";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".bulk_price_lot,0)) AS bulk_price_lot";
        $sql_fields[] = "FORMAT(".LAND_TABLE.".unit_density_net_acre,3) AS unit_density_net_acre";

        
        $tables_sql[] = REPORT_TABLE;
        $tables_sql[] = ' LEFT JOIN '.PROPERTY_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTY_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.LAND_TABLE.' ON '.REPORT_TABLE.'.id='.LAND_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.SALES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.SALES_TRANSACTIONS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.SUBMARKET_TABLE.' ON '.PROPERTY_TABLE.'.submarkid='.SUBMARKET_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.PROPERTYTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertytype='.PROPERTYTYPE_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFDICTIONARY_TABLE.' ON '.SALES_TRANSACTIONS_TABLE.'.sale_status='.WFDICTIONARY_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.PROPERTYSUBTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertysubtype='.PROPERTYSUBTYPE_TABLE.'.id';
         
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
    
    public function getRecord($id){
        
        
        $sql_fields[] = REPORT_TABLE.".id";
        $sql_fields[] = REPORT_TABLE.".status";
        $sql_fields[] = REPORT_TABLE.".priority";
        $sql_fields[] = REPORT_TABLE.".AssignedTo";
        $sql_fields[] = REPORT_TABLE.".DueDate";
        $sql_fields[] = REPORT_TABLE.".reportname";
        $sql_fields[] = REPORT_TABLE.".template";
        $sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateCreated,'%M %e %Y %r') as DateCreated";
        $sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateModified,'%M %e %Y %r') as DateModified";
        $sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateModified,'%M %e %Y %r') as DateModified";
		$sql_fields[] = "IF(".REPORT_TABLE.".cloneorigin is NULL, 'Original File', CONCAT('Clone of ',".REPORT_TABLE.".cloneorigin, ' ID ', ".REPORT_TABLE.".cloneid)) as FileOrigin";
		$sql_fields[] = "IF(".REPORT_TABLE.".cloneorigin = 'Appraisal Report', CONCAT('appraisals.php?id=',".REPORT_TABLE.".cloneid), IF(".REPORT_TABLE.".cloneorigin = 'Improved Sales', CONCAT('improvedsales.php?id=',".REPORT_TABLE.".cloneid), IF(".REPORT_TABLE.".cloneorigin = 'Land Sales', CONCAT('landsales.php?id=',".REPORT_TABLE.".cloneid), CONCAT('leases.php?id=',".REPORT_TABLE.".cloneid)))) as clonelink";
        
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
        $sql_fields[] = PROPERTY_TABLE.".platmap";
        $sql_fields[] = "if(".PROPERTY_TABLE.".platmap = '', 'no-photo.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".platmap)) as platimage";
        $sql_fields[] = PROPERTY_TABLE.".streetview";
        $sql_fields[] = "if(".PROPERTY_TABLE.".streetview = '', 'no-photo.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".streetview)) as streetimage";
        $sql_fields[] = PROPERTY_TABLE.".gla_inputtype";
        $sql_fields[] = PROPERTY_TABLE.".thumbnail";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gla_inputsize,3) AS gla_inputsize";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_acre,3) AS gross_land_acre";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_sf,0) AS gross_land_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".unusable_sf,0) AS unusable_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".unusable_acre,3) AS unusable_acre";
        $sql_fields[] = PROPERTY_TABLE.".unusable_desc";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_sf,0) AS net_usable_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_acre,3) AS net_usable_acre";
        $sql_fields[] = PROPERTY_TABLE.".net_usable_desc";
        $sql_fields[] = PROPERTY_TABLE.".assessedyear";
        $sql_fields[] = PROPERTY_TABLE.".shape";
        $sql_fields[] = PROPERTY_TABLE.".topography";
        $sql_fields[] = PROPERTY_TABLE.".utilities";
        $sql_fields[] = PROPERTY_TABLE.".flood_plain";
        $sql_fields[] = PROPERTY_TABLE.".fppanel";
        $sql_fields[] = PROPERTY_TABLE.".orientation";
        $sql_fields[] = PROPERTY_TABLE.".site_access";
        $sql_fields[] = PROPERTY_TABLE.".exposure";
        $sql_fields[] = PROPERTY_TABLE.".easement";
        $sql_fields[] = PROPERTY_TABLE.".easement_desc";
        $sql_fields[] = PROPERTY_TABLE.".soiltype";
        $sql_fields[] = PROPERTY_TABLE.".irrigation";
        $sql_fields[] = PROPERTY_TABLE.".other_land_comments";
        $sql_fields[] = PROPERTY_TABLE.".change_zoning";
        $sql_fields[] = PROPERTY_TABLE.".zoning_juris";
        $sql_fields[] = PROPERTY_TABLE.".zoning_code";
        $sql_fields[] = PROPERTY_TABLE.".zoning_desc";
        $sql_fields[] = PROPERTY_TABLE.".inc_far";
        $sql_fields[] = PROPERTY_TABLE.".fut_zoning_code";
        $sql_fields[] = PROPERTY_TABLE.".fut_zoning_juris";
        $sql_fields[] = PROPERTY_TABLE.".fut_zoning_desc";
        $sql_fields[] = PROPERTY_TABLE.".rezone_time";
        $sql_fields[] = PROPERTY_TABLE.".max_building_ht";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".floor_area_ratio,1) AS floor_area_ratio";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".max_floor_area,1) AS max_floor_area";
        $sql_fields[] = PROPERTY_TABLE.".traffic_count";
        $sql_fields[] = PROPERTY_TABLE.".traffic_date";
        $sql_fields[] = PROPERTY_TABLE.".inter_street";
        $sql_fields[] = PROPERTY_TABLE.".rural_electricity";
        $sql_fields[] = PROPERTY_TABLE.".well_septic";
        $sql_fields[] = PROPERTY_TABLE.".municiple_sewer";
        $sql_fields[] = PROPERTY_TABLE.".municiple_water";
        $sql_fields[] = PROPERTY_TABLE.".natural_gas";
        $sql_fields[] = PROPERTY_TABLE.".telephone";
        $sql_fields[] = PROPERTY_TABLE.".cable_tv";
        $sql_fields[] = PROPERTY_TABLE.".cable_tv";
        $sql_fields[] = PROPERTY_TABLE.".proposed_building";
        $sql_fields[] = PROPERTY_TABLE.".ground_lease";
        $sql_fields[] = PROPERTY_TABLE.".emdomain";
        $sql_fields[] = PROPERTY_TABLE.".waterrights";
        $sql_fields[] = PROPERTY_TABLE.".irigwell";
        $sql_fields[] = PROPERTY_TABLE.".dwellrights";
        $sql_fields[] = PROPERTY_TABLE.".homesite";
        $sql_fields[] = PROPERTY_TABLE.".nohomesite";
        
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".property_appraised";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".mc_job";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".appraiser_name";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".appraiser_name_two";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".grantor";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".grantee";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".land_alloc_sale";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".sale_price,0)) AS sale_price";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".less_alloc_imp_price,0)) AS less_alloc_imp_price";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".improve_value_source";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".alloc_land_value,0)) AS alloc_land_value";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".prop_rights_conv";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".interest_conv";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".conv_doc_type";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".conv_doc_rec_no";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".record_date";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".record_date_two";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".sale_status";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".market_time";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".current_use";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".proposed_use_change";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".proposed_use_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".fee_equiv_price,0)) AS fee_equiv_price";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".fee_simple_equiv_price,0)) AS fee_simple_equiv_price";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".cash_equiv_price,0)) AS cash_equiv_price";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".type_finance";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".list_price_avail";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".list_price,0)) AS list_price";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".list_price_change,1)) AS list_price_change";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".datasource";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".inspect_date";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".confirm_date";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".inspect_type";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".mc_file_no";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".confirm_1_source";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".relationship_1";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".confirm_2_souce";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".relationship_2";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".market_flyer";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".fin_term_adj,0)) AS fin_term_adj";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".fin_term_adj_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".cond_sale_adj,0)) AS cond_sale_adj";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".cond_sale_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".demo_cost,0)) AS demo_cost";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".demo_cost_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".onsite_extra_cost,0)) AS onsite_extra_cost";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".onsite_extra_cost_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".offsite_develop,0)) AS offsite_develop";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".offsite_develop_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".broker_cost,0)) AS broker_cost";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".broker_cost_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".eff_sale_price_stab,0)) AS eff_sale_price_stab";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".adj_price_comment";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".inc_ffe";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".value_ffe,2)) AS value_ffe";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".desc_ffe";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_acre_gross,0)) AS adj_price_acre_gross";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_acre_net,0)) AS adj_price_acre_net";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_gross,2)) AS adj_price_sf_gross";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".desc_ffe";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_net,2)) AS adj_price_sf_net";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_far,2)) AS adj_price_sf_far";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adjhomesite,0)) AS adjhomesite";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".sale_comments";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".conf_comments";
		$sql_fields[] = SALES_TRANSACTIONS_TABLE.".confirm1";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".confirm2";
        
        $sql_fields[] = GROUND_LEASE_TABLE.".gl_development_name";
        $sql_fields[] = GROUND_LEASE_TABLE.".gl_year_built";
        $sql_fields[] = "FORMAT(".GROUND_LEASE_TABLE.".gl_total_project,0) AS gl_total_project";
        $sql_fields[] = "FORMAT(".GROUND_LEASE_TABLE.".gl_leased_land_sf,0) AS gl_leased_land_sf";
        $sql_fields[] = "FORMAT(".GROUND_LEASE_TABLE.".gl_building_footprint,0) AS gl_building_footprint";
        $sql_fields[] = GROUND_LEASE_TABLE.".gl_anchor_tenants";
        $sql_fields[] = GROUND_LEASE_TABLE.".gl_major_tenants";
        $sql_fields[] = GROUND_LEASE_TABLE.".gl_status";
        $sql_fields[] = GROUND_LEASE_TABLE.".gl_start_date";
        $sql_fields[] = GROUND_LEASE_TABLE.".gl_end_date";
        $sql_fields[] = GROUND_LEASE_TABLE.".gl_options_period";
        $sql_fields[] = GROUND_LEASE_TABLE.".gl_escalations";
        $sql_fields[] = GROUND_LEASE_TABLE.".gl_length";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".GROUND_LEASE_TABLE.".gl_rent_begin,0)) AS gl_rent_begin";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".GROUND_LEASE_TABLE.".gl_rent_per_sf_land,2)) AS gl_rent_per_sf_land";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".GROUND_LEASE_TABLE.".gl_rent_per_sf_footprint,2)) AS gl_rent_per_sf_footprint";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".GROUND_LEASE_TABLE.".gl_fee_simple_equiv,0)) AS gl_fee_simple_equiv";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".GROUND_LEASE_TABLE.".gl_fee_equiv_per_sf,0)) AS gl_fee_equiv_per_sf";
        $sql_fields[] = "CONCAT(FORMAT(".GROUND_LEASE_TABLE.".gl_rate_return,1),' %') AS gl_rate_return";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".GROUND_LEASE_TABLE.".adj_price_sf_pad,0)) AS adj_price_sf_pad";
        
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".floor_1_gba,0) AS floor_1_gba";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".site_cover_primary,1),' %') AS site_cover_primary";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".floor_2_gba,0) AS floor_2_gba";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".land_build_ratio_primary,1) AS land_build_ratio_primary";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".total_basement_gba,0) AS total_basement_gba";
        $sql_fields[] = BUILDING_TABLE.".gba_source";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) AS overall_gba";
        
        $sql_fields[] = LAND_TABLE.".type_land_radio";
        $sql_fields[] = LAND_TABLE.".type_residential_land";
        $sql_fields[] = LAND_TABLE.".lot_complete_date";
        $sql_fields[] = LAND_TABLE.".unit_lot_type";
        $sql_fields[] = LAND_TABLE.".fut_avg_home_price";
        $sql_fields[] = LAND_TABLE.".no_lots";
        $sql_fields[] = LAND_TABLE.".fut_avg_home_price2";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".unadj_sale_price,0)) AS unadj_sale_price";
        $sql_fields[] = LAND_TABLE.".lot_home_price_ratio";
        $sql_fields[] = "FORMAT(".LAND_TABLE.".unit_density_net_acre,3) AS unit_density_net_acre";
        $sql_fields[] = LAND_TABLE.".hard_cost_lot";
        $sql_fields[] = LAND_TABLE.".off_site_imp";
        $sql_fields[] = LAND_TABLE.".fut_finish_size_range";
        $sql_fields[] = LAND_TABLE.".fut_finish_size_avg";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".value_entitle,0)) AS value_entitle";
        $sql_fields[] = LAND_TABLE.".inc_entitlement";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".value_entitlement_lot,0)) AS value_entitlement_lot";
        $sql_fields[] = LAND_TABLE.".site_amenities";
        $sql_fields[] = LAND_TABLE.".proj_fut_avg_finish_price";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".adj_price_finish_with,0)) AS adj_price_finish_with";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".sale_price_lot_with,0)) AS sale_price_lot_with";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".sale_price_net_acre_with,0)) AS sale_price_net_acre_with";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".price_net_sf_with,2)) AS price_net_sf_with";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".adj_price_finished_wo,0)) AS adj_price_finished_wo";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".sale_price_lot_wo,0)) AS sale_price_lot_wo";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".sale_price_net_acre_wo,0)) AS sale_price_net_acre_wo";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".price_net_sf_wo,2)) AS price_net_sf_wo";
        $sql_fields[] = LAND_TABLE.".ind_lot_nos";
        $sql_fields[] = LAND_TABLE.".finish_lot_size_range";
        $sql_fields[] = "FORMAT(".LAND_TABLE.".finish_lot_size_sfba,0) AS finish_lot_size_sfba";
        $sql_fields[] = LAND_TABLE.".finish_lot_size_sf";
        $sql_fields[] = LAND_TABLE.".lot_topography";
        $sql_fields[] = LAND_TABLE.".project_amenities";
        $sql_fields[] = LAND_TABLE.".original_price";
        $sql_fields[] = LAND_TABLE.".other_lot_comment";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".adj_bulk_sale_price,2)) AS adj_bulk_sale_price";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".bulk_price_lot,0)) AS bulk_price_lot";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LAND_TABLE.".bulk_price_sf_avg,0)) AS bulk_price_sf_avg";
        $sql_fields[] = LAND_TABLE.".report_price_lot";
        $sql_fields[] = LAND_TABLE.".ind_sale_pct_discount";
        
        $sql_fields[] = TEMPLATES_TABLE.".templatepath";
        $sql_fields[] = "CONCAT(".WFUSERS_TABLE.".firstname,' ',".WFUSERS_TABLE.".lastname) as CreatedBy";
        $sql_fields[] = "CONCAT(".WFUSERS_M_TABLE.".firstname,' ',".WFUSERS_M_TABLE.".lastname) as ModifiedBy";
        
        $tables_sql[] = REPORT_TABLE;
        $tables_sql[] = ' JOIN '.PROPERTY_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTY_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.SALES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.SALES_TRANSACTIONS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.GROUND_LEASE_TABLE.' ON '.REPORT_TABLE.'.id='.GROUND_LEASE_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.BUILDING_TABLE.' ON '.REPORT_TABLE.'.id='.BUILDING_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.LAND_TABLE.' ON '.REPORT_TABLE.'.id='.LAND_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.TEMPLATES_TABLE.' ON '.REPORT_TABLE.'.template='.TEMPLATES_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFUSERS_TABLE.' ON '.REPORT_TABLE.'.CreatedBy='.WFUSERS_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFUSERS_TABLE.' '.WFUSERS_M_TABLE.' ON '.REPORT_TABLE.'.ModifiedBy='.WFUSERS_M_TABLE.'.id';
        
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
    
    public function landsaleOperation($landsales,$user_id){
        $actionMode = "INSERT";
        if(isset($_GET['id'])){
            $actionMode = "UPDATE";
        }
        
        try{
            $this->db->beginTransaction();
        
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".REPORT_TABLE." (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, template, CreatedBy, ModifiedBy)	VALUES (:FK_ReportTypeID, :status, :priority, :AssignedTo, :DueDate, :OwnerID, :reportname, :template, :CreatedBy, :ModifiedBy)");
        
                $stmt->bindValue(':FK_ReportTypeID',4,PDO::PARAM_INT);
                $stmt->bindValue(':OwnerID',$user_id,PDO::PARAM_INT);
                $stmt->bindValue(':CreatedBy',$user_id,PDO::PARAM_INT);
                $stmt->bindValue(':ModifiedBy',$user_id,PDO::PARAM_INT);
            }else{
                $stmt = $this->db->prepare("UPDATE ".REPORT_TABLE." SET status=:status, DateModified=:DateModified, priority=:priority, AssignedTo=:AssignedTo, DueDate=:DueDate, reportname=:reportname, template=:template, ModifiedBy=:ModifiedBy WHERE ".REPORT_TABLE.".id=:reportID");
        
                $stmt->bindValue(':DateModified',$landsales->getDateModified(),PDO::PARAM_STR);
                $stmt->bindValue(':reportID',$landsales->getId(),PDO::PARAM_INT);
                $stmt->bindValue(':ModifiedBy',$user_id,PDO::PARAM_INT);
            }
        
            /*Common bindings*/
            $stmt->bindValue(':status',$landsales->getStatus(),PDO::PARAM_INT);
            $stmt->bindValue(':priority',$landsales->getPriority(),PDO::PARAM_INT);
            $stmt->bindValue(':AssignedTo',$landsales->getAssignedTo(),PDO::PARAM_INT);
            $stmt->bindValue(':DueDate',$landsales->getDueDate(),PDO::PARAM_STR);
            $stmt->bindValue(':reportname',$landsales->getReportname(),PDO::PARAM_STR);
            $stmt->bindValue(':template',$landsales->getTemplate(),PDO::PARAM_INT);
        
            $stmt->execute();
        
            if($actionMode=="INSERT"){
                $landsales->setId($this->db->lastInsertId());
            }
        
            $directory = "../comp_images/".$landsales->getId();
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
                $folder = "../comp_images/" . $landsales->getId() . "/";
                $new_file_name = round(microtime(true)) . '.' . end($file);
                $final_file=str_replace(' ','-',$new_file_name);
                move_uploaded_file($file_loc,$folder.$final_file);
                $mediaUtilities->imageTransformations($final_file,$folder,400,400,100,"","","resize",true);
                $final_file_thumb = explode(".",$final_file);
                $extension = $final_file_thumb[count($final_file_thumb)-1];
                array_splice($final_file_thumb,count($final_file_thumb)-1);
                $final_file_thumb = implode(".",$final_file_thumb);
                $final_file_thumb = $final_file_thumb."-tn".".".$extension;
                $mediaUtilities->imageTransformations($final_file,$folder,40,40,100,"-tn","","resize",true);
            }
            $landsales->setPhoto1($final_file);
            $landsales->setThumbnail($final_file_thumb);
            
            $mediaUtilities = new rbe_mediaUtilities();
            if(!file_exists($_FILES['platmap']['tmp_name']) || !is_uploaded_file($_FILES['platmap']['tmp_name'])) {
                $platmap = $_POST['platpath'];
            } else {
                $file = explode(".", $_FILES["platmap"]["name"]);
                $file_loc = $_FILES['platmap']['tmp_name'];
                $file_size = $_FILES['platmap']['size'];
                $file_type = $_FILES['platmap']['type'];
                $folder = "../comp_images/" . $landsales->getId() . "/";
                $new_file_name = round(microtime(true)) . rand(10,99).'.' . end($file);
                $platmap = str_replace(' ','-',$new_file_name);
                move_uploaded_file($file_loc,$folder.$platmap);
                $mediaUtilities->imageTransformations($platmap,$folder,400,400,100,"","","resize",true);
             }
            $landsales->setPlatmap($platmap);
			
			$mediaUtilities = new rbe_mediaUtilities();
            if(!file_exists($_FILES['streetview']['tmp_name']) || !is_uploaded_file($_FILES['streetview']['tmp_name'])) {
                $streetview = $_POST['streetimage'];
            } else {
                $file = explode(".", $_FILES["streetview"]["name"]);
                $file_loc = $_FILES['streetview']['tmp_name'];
                $file_size = $_FILES['streetview']['size'];
                $file_type = $_FILES['streetview']['type'];
                $folder = "../comp_images/" . $landsales->getId() . "/";
                $new_file_name = round(microtime(true)) . rand(10,99).'.' . end($file);
                $streetview = str_replace(' ','-',$new_file_name);
                move_uploaded_file($file_loc,$folder.$streetview);
                $mediaUtilities->imageTransformations($streetview,$folder,400,400,100,"","","resize",true);
             }
            $landsales->setStreetview($streetview);

            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT ".PROPERTY_TABLE." (FK_ReportID, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, legal_desc, photo1, thumbnail, platmap, streetview, gla_inputtype, gla_inputsize, gross_land_acre, gross_land_sf, unusable_sf, unusable_acre, unusable_desc, net_usable_sf, net_usable_acre, net_usable_desc, shape, topography, utilities, flood_plain, fppanel, orientation, site_access, exposure, easement, easement_desc, soiltype, irrigation, other_land_comments, change_zoning, zoning_juris, zoning_code, zoning_desc, inc_far, fut_zoning_code, fut_zoning_juris, fut_zoning_desc, rezone_time, max_building_ht, floor_area_ratio, max_floor_area, traffic_count, traffic_date, inter_street, rural_electricity, well_septic, municiple_sewer, municiple_water, natural_gas, telephone, cable_tv, proposed_building, ground_lease, emdomain, assessedyear, rmvland, rmvimp, rmvtotal, taxes, waterrights, irigwell, dwellrights, homesite, nohomesite) VALUES (:FK_ReportID, :property_name, :address, :streetnumber, :streetname, :city, :county, :state, :zip_code, :lat,:lng, :propertytype, :propertysubtype, :msa, :genmarket, :submarkid, :legal_desc, :photo1, :thumbnail, :platmap, :streetview, :gla_inputtype, :gla_inputsize, :gross_land_acre, :gross_land_sf, :unusable_sf, :unusable_acre, :unusable_desc, :net_usable_sf, :net_usable_acre, :net_usable_desc, :shape, :topography, :utilities, :flood_plain, :fppanel, :orientation, :site_access, :exposure, :easement, :easement_desc, :soiltype, :irrigation, :other_land_comments, :change_zoning, :zoning_juris, :zoning_code, :zoning_desc, :inc_far, :fut_zoning_code, :fut_zoning_juris, :fut_zoning_desc, :rezone_time, :max_building_ht, :floor_area_ratio, :max_floor_area, :traffic_count, :traffic_date, :inter_street, :rural_electricity, :well_septic, :municiple_sewer, :municiple_water, :natural_gas, :telephone, :cable_tv, :proposed_building, :ground_lease, :emdomain, :assessedyear, :rmvland, :rmvimp, :rmvtotal, :taxes, :waterrights, :irigwell, :dwellrights, :homesite, :nohomesite) ");
            }else{
                $stmt = $this->db->prepare("UPDATE ".PROPERTY_TABLE." SET property_name=:property_name, address=:address, streetnumber=:streetnumber, streetname=:streetname, city=:city, county=:county, state=:state, zip_code=:zip_code, lat=:lat, lng=:lng, propertytype=:propertytype, propertysubtype=:propertysubtype, msa=:msa, genmarket=:genmarket, submarkid=:submarkid, legal_desc=:legal_desc, photo1=:photo1, thumbnail=:thumbnail, platmap=:platmap, streetview=:streetview, gla_inputtype=:gla_inputtype, gla_inputsize=:gla_inputsize, gross_land_acre=:gross_land_acre,gross_land_sf=:gross_land_sf, unusable_sf=:unusable_sf, unusable_acre=:unusable_acre, unusable_desc=:unusable_desc, net_usable_sf=:net_usable_sf, net_usable_acre=:net_usable_acre,net_usable_desc=:net_usable_desc, shape=:shape, topography=:topography, utilities=:utilities, flood_plain=:flood_plain, fppanel=:fppanel, orientation=:orientation,site_access=:site_access, exposure=:exposure, easement=:easement, easement_desc=:easement_desc, soiltype=:soiltype, irrigation=:irrigation, other_land_comments=:other_land_comments, change_zoning=:change_zoning,zoning_juris=:zoning_juris, zoning_code=:zoning_code, zoning_desc=:zoning_desc, inc_far=:inc_far, fut_zoning_code=:fut_zoning_code, fut_zoning_juris=:fut_zoning_juris,fut_zoning_desc=:fut_zoning_desc, rezone_time=:rezone_time, max_building_ht=:max_building_ht, floor_area_ratio=:floor_area_ratio, max_floor_area=:max_floor_area,traffic_count=:traffic_count, traffic_date=:traffic_date, inter_street=:inter_street, rural_electricity=:rural_electricity, well_septic=:well_septic, municiple_sewer=:municiple_sewer, municiple_water=:municiple_water, natural_gas=:natural_gas, telephone=:telephone,cable_tv=:cable_tv, proposed_building=:proposed_building, ground_lease=:ground_lease, emdomain=:emdomain, assessedyear=:assessedyear, rmvland=:rmvland, rmvimp=:rmvimp, rmvtotal=:rmvtotal, taxes=:taxes, waterrights=:waterrights, irigwell=:irigwell, dwellrights=:dwellrights, homesite=:homesite, nohomesite=:nohomesite WHERE ".PROPERTY_TABLE.".FK_ReportID=:FK_ReportID");
            }
        
            $stmt->bindValue(':property_name',$landsales->getProperty_name(),PDO::PARAM_STR);
            $stmt->bindValue(':address',$landsales->getAddress(),PDO::PARAM_STR);
            $stmt->bindValue(':streetnumber',$landsales->getStreetnumber(),PDO::PARAM_STR);
            $stmt->bindValue(':streetname',$landsales->getStreetname(),PDO::PARAM_STR);
            $stmt->bindValue(':city',$landsales->getCity(),PDO::PARAM_STR);
            $stmt->bindValue(':county',$landsales->getCounty(),PDO::PARAM_STR);
            $stmt->bindValue(':state',$landsales->getState(),PDO::PARAM_STR);
            $stmt->bindValue(':zip_code',$landsales->getZip_code(),PDO::PARAM_STR);
            $stmt->bindValue(':lat',$landsales->getLat(),PDO::PARAM_STR);
            $stmt->bindValue(':lng',$landsales->getLng(),PDO::PARAM_STR);
            $stmt->bindValue(':propertytype',$landsales->getPropertytype(),PDO::PARAM_INT);
            $stmt->bindValue(':propertysubtype',$landsales->getPropertysubtype(),PDO::PARAM_STR);
            $stmt->bindValue(':msa',$landsales->getMsa(),PDO::PARAM_STR);
            $stmt->bindValue(':genmarket',$landsales->getGenmarket(),PDO::PARAM_STR);
            $stmt->bindValue(':submarkid',$landsales->getSubmarkid(),PDO::PARAM_INT);
            $stmt->bindValue(':legal_desc',$landsales->getLegal_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':photo1',$landsales->getPhoto1(),PDO::PARAM_STR);
            $stmt->bindValue(':thumbnail',$landsales->getThumbnail(),PDO::PARAM_STR);
            $stmt->bindValue(':platmap',$landsales->getPlatmap(),PDO::PARAM_STR);
            $stmt->bindValue(':streetview',$landsales->getStreetview(),PDO::PARAM_STR);
            $stmt->bindValue(':gla_inputtype',$landsales->getGla_inputtype(),PDO::PARAM_INT);
            $stmt->bindValue(':gla_inputsize',$landsales->getGla_inputsize(),PDO::PARAM_STR);
            $stmt->bindValue(':gross_land_acre',$landsales->getGross_land_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':gross_land_sf',$landsales->getGross_land_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':unusable_sf',$landsales->getUnusable_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':unusable_acre',$landsales->getUnusable_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':unusable_desc',$landsales->getUnusable_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':net_usable_sf',$landsales->getNet_usable_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':net_usable_acre',$landsales->getNet_usable_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':net_usable_desc',$landsales->getNet_usable_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':shape',$landsales->getShape(),PDO::PARAM_INT);
            $stmt->bindValue(':topography',$landsales->getTopography(),PDO::PARAM_INT);
            $stmt->bindValue(':utilities',$landsales->getUtilities(),PDO::PARAM_STR);
            $stmt->bindValue(':flood_plain',$landsales->getFlood_plain(),PDO::PARAM_INT);
            $stmt->bindValue(':fppanel',$landsales->getFppanel(),PDO::PARAM_STR);
            $stmt->bindValue(':orientation',$landsales->getOrientation(),PDO::PARAM_INT);
            $stmt->bindValue(':site_access',$landsales->getSite_access(),PDO::PARAM_INT);
            $stmt->bindValue(':exposure',$landsales->getExposure(),PDO::PARAM_INT);
            $stmt->bindValue(':easement',$landsales->getEasement(),PDO::PARAM_INT);
            $stmt->bindValue(':easement_desc',$landsales->getEasement_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':soiltype',$landsales->getSoiltype(),PDO::PARAM_STR);
            $stmt->bindValue(':irrigation',$landsales->getIrrigation(),PDO::PARAM_INT);
            $stmt->bindValue(':other_land_comments',$landsales->getOther_land_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':change_zoning',$landsales->getChange_zoning(),PDO::PARAM_INT);
            $stmt->bindValue(':zoning_juris',$landsales->getZoning_juris(),PDO::PARAM_STR);
            $stmt->bindValue(':zoning_code',$landsales->getZoning_code(),PDO::PARAM_STR);
            $stmt->bindValue(':zoning_desc',$landsales->getZoning_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':inc_far',$landsales->getInc_far(),PDO::PARAM_INT);
            $stmt->bindValue(':fut_zoning_code',$landsales->getFut_zoning_code(),PDO::PARAM_STR);
            $stmt->bindValue(':fut_zoning_juris',$landsales->getFut_zoning_juris(),PDO::PARAM_STR);
            $stmt->bindValue(':fut_zoning_desc',$landsales->getFut_zoning_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':rezone_time',$landsales->getRezone_time(),PDO::PARAM_STR);
            $stmt->bindValue(':max_building_ht',$landsales->getMax_building_ht(),PDO::PARAM_STR);
            $stmt->bindValue(':floor_area_ratio',$landsales->getFloor_area_ratio(),PDO::PARAM_STR);
            $stmt->bindValue(':max_floor_area',$landsales->getMax_floor_area(),PDO::PARAM_INT);
            $stmt->bindValue(':traffic_count',$landsales->getTraffic_count(),PDO::PARAM_STR);
            $stmt->bindValue(':traffic_date',$landsales->getTraffic_date(),PDO::PARAM_STR);
            $stmt->bindValue(':inter_street',$landsales->getInter_street(),PDO::PARAM_STR);
            $stmt->bindValue(':rural_electricity',$landsales->getRural_electricity(),PDO::PARAM_INT);
            $stmt->bindValue(':well_septic',$landsales->getWell_septic(),PDO::PARAM_INT);
            $stmt->bindValue(':municiple_sewer',$landsales->getMuniciple_sewer(),PDO::PARAM_INT);
            $stmt->bindValue(':municiple_water',$landsales->getMuniciple_water(),PDO::PARAM_INT);
            $stmt->bindValue(':natural_gas',$landsales->getNatural_gas(),PDO::PARAM_INT);
            $stmt->bindValue(':telephone',$landsales->getTelephone(),PDO::PARAM_INT);
            $stmt->bindValue(':cable_tv',$landsales->getCable_tv(),PDO::PARAM_INT);
            $stmt->bindValue(':proposed_building',$landsales->getProposed_building(),PDO::PARAM_INT);
            $stmt->bindValue(':ground_lease',$landsales->getGround_lease(),PDO::PARAM_INT);
            $stmt->bindValue(':emdomain',$landsales->getEmdomain(),PDO::PARAM_INT);
            $stmt->bindValue(':assessedyear',$landsales->getAssessedyear(),PDO::PARAM_STR);
            $stmt->bindValue(':rmvland',$landsales->getRmvland(),PDO::PARAM_INT);
            $stmt->bindValue(':rmvimp',$landsales->getRmvimp(),PDO::PARAM_INT);
            $stmt->bindValue(':rmvtotal',$landsales->getRmvtotal(),PDO::PARAM_INT);
            $stmt->bindValue(':taxes',$landsales->getTaxes(),PDO::PARAM_STR);            
            $stmt->bindValue(':waterrights',$landsales->getWaterrights(),PDO::PARAM_INT);
            $stmt->bindValue(':irigwell',$landsales->getIrigwell(),PDO::PARAM_STR);
            $stmt->bindValue(':dwellrights',$landsales->getDwellrights(),PDO::PARAM_INT);
            $stmt->bindValue(':homesite',$landsales->getHomesite(),PDO::PARAM_STR);
            $stmt->bindValue(':nohomesite',$landsales->getNohomesite(),PDO::PARAM_INT);
            $stmt->bindValue(':FK_ReportID',$landsales->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
        
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".BUILDING_TABLE." (FK_ReportID, floor_1_gba, site_cover_primary, floor_2_gba, land_build_ratio_primary, total_basement_gba, gba_source, overall_gba)
                    VALUES  (:FK_ReportID,:floor_1_gba, :site_cover_primary, :floor_2_gba, :land_build_ratio_primary, :total_basement_gba, :gba_source, :overall_gba)");
        
            }else{
                $stmt = $this->db->prepare("UPDATE ".BUILDING_TABLE." SET floor_1_gba=:floor_1_gba, site_cover_primary=:site_cover_primary, floor_2_gba=:floor_2_gba,
                    land_build_ratio_primary=:land_build_ratio_primary, total_basement_gba=:total_basement_gba, gba_source=:gba_source, overall_gba=:overall_gba
                    WHERE ".BUILDING_TABLE.".FK_ReportID=:FK_ReportID");
            }
        
            $stmt->bindValue(':floor_1_gba',$landsales->getFloor_1_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':site_cover_primary',$landsales->getSite_cover_primary(),PDO::PARAM_STR);
            $stmt->bindValue(':floor_2_gba',$landsales->getFloor_2_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':land_build_ratio_primary',$landsales->getLand_build_ratio_primary(),PDO::PARAM_STR);
            $stmt->bindValue(':total_basement_gba',$landsales->getTotal_basement_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':gba_source',$landsales->getGba_source(),PDO::PARAM_STR);
            $stmt->bindValue(':overall_gba',$landsales->getOverall_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':FK_ReportID',$landsales->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
        
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".GROUND_LEASE_TABLE." (FK_ReportID, gl_development_name, gl_year_built, gl_total_project, gl_leased_land_sf, gl_building_footprint, gl_anchor_tenants, gl_major_tenants, gl_status, gl_start_date, gl_end_date, gl_options_period, gl_escalations, gl_length, gl_rent_begin, gl_rent_per_sf_land, gl_rent_per_sf_footprint, gl_fee_simple_equiv, gl_fee_equiv_per_sf, gl_rate_return, adj_price_sf_pad) VALUES  (:FK_ReportID, :gl_development_name, :gl_year_built, :gl_total_project, :gl_leased_land_sf, :gl_building_footprint, :gl_anchor_tenants, :gl_major_tenants, :gl_status, :gl_start_date, :gl_end_date, :gl_options_period, :gl_escalations, :gl_length, :gl_rent_begin, :gl_rent_per_sf_land, :gl_rent_per_sf_footprint, :gl_fee_simple_equiv, :gl_fee_equiv_per_sf, :gl_rate_return, :adj_price_sf_pad)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".GROUND_LEASE_TABLE." SET gl_development_name=:gl_development_name, gl_year_built=:gl_year_built, gl_total_project=:gl_total_project, gl_leased_land_sf=:gl_leased_land_sf, gl_building_footprint=:gl_building_footprint, gl_anchor_tenants=:gl_anchor_tenants, gl_major_tenants=:gl_major_tenants, gl_status=:gl_status, gl_start_date=:gl_start_date, gl_end_date=:gl_end_date,gl_options_period=:gl_options_period,gl_escalations=:gl_escalations,gl_length=:gl_length,gl_rent_begin=:gl_rent_begin, gl_rent_per_sf_land=:gl_rent_per_sf_land, gl_rent_per_sf_footprint=:gl_rent_per_sf_footprint, gl_fee_simple_equiv=:gl_fee_simple_equiv, gl_fee_equiv_per_sf=:gl_fee_equiv_per_sf, gl_rate_return=:gl_rate_return, adj_price_sf_pad=:adj_price_sf_pad WHERE ".GROUND_LEASE_TABLE.".FK_ReportID=:FK_ReportID");
            }
        
            $stmt->bindValue(':gl_development_name',$landsales->getGl_development_name(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_year_built',$landsales->getGl_year_built(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_total_project',$landsales->getGl_total_project(),PDO::PARAM_INT);
            $stmt->bindValue(':gl_leased_land_sf',$landsales->getGl_leased_land_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':gl_building_footprint',$landsales->getGl_building_footprint(),PDO::PARAM_INT);
            $stmt->bindValue(':gl_anchor_tenants',$landsales->getGl_anchor_tenants(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_major_tenants',$landsales->getGl_major_tenants(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_status',$landsales->getGl_status(),PDO::PARAM_INT);
            $stmt->bindValue(':gl_start_date',$landsales->getGl_start_date(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_end_date',$landsales->getGl_end_date(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_options_period',$landsales->getGl_options_period(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_escalations',$landsales->getGl_escalations(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_length',$landsales->getGl_length(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_rent_begin',$landsales->getGl_rent_begin(),PDO::PARAM_INT);
            $stmt->bindValue(':gl_rent_per_sf_land',$landsales->getGl_rent_per_sf_land(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_rent_per_sf_footprint',$landsales->getGl_rent_per_sf_footprint(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_fee_simple_equiv',$landsales->getGl_fee_simple_equiv(),PDO::PARAM_INT);
            $stmt->bindValue(':gl_fee_equiv_per_sf',$landsales->getGl_fee_equiv_per_sf(),PDO::PARAM_STR);
            $stmt->bindValue(':gl_rate_return',$landsales->getGl_rate_return(),PDO::PARAM_STR);
            $stmt->bindValue(':adj_price_sf_pad',$landsales->getAdj_price_sf_pad(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$landsales->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
        
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".LAND_TABLE." (FK_ReportID, type_land_radio, type_residential_land, unit_lot_type, no_lots, unadj_sale_price, lot_complete_date, fut_avg_home_price, fut_avg_home_price2, lot_home_price_ratio, unit_density_net_acre, hard_cost_lot, off_site_imp, fut_finish_size_range, fut_finish_size_avg, value_entitle, inc_entitlement, value_entitlement_lot, site_amenities, proj_fut_avg_finish_price, adj_price_finish_with, sale_price_lot_with, sale_price_net_acre_with, price_net_sf_with, adj_price_finished_wo, sale_price_lot_wo, sale_price_net_acre_wo, price_net_sf_wo, ind_lot_nos, finish_lot_size_range, finish_lot_size_sfba, finish_lot_size_sf, lot_topography, project_amenities, original_price, other_lot_comment, bulk_price_lot, bulk_price_sf_avg, adj_bulk_sale_price, ind_sale_pct_discount, report_price_lot) VALUES  (:FK_ReportID, :type_land_radio, :type_residential_land, :unit_lot_type, :no_lots, :unadj_sale_price, :lot_complete_date, :fut_avg_home_price, :fut_avg_home_price2, :lot_home_price_ratio, :unit_density_net_acre, :hard_cost_lot, :off_site_imp, :fut_finish_size_range, :fut_finish_size_avg, :value_entitle, :inc_entitlement, :value_entitlement_lot, :site_amenities, :proj_fut_avg_finish_price, :adj_price_finish_with, :sale_price_lot_with, :sale_price_net_acre_with, :price_net_sf_with, :adj_price_finished_wo, :sale_price_lot_wo,:sale_price_net_acre_wo, :price_net_sf_wo, :ind_lot_nos, :finish_lot_size_range, :finish_lot_size_sfba, :finish_lot_size_sf,  :lot_topography, :project_amenities, :original_price, :other_lot_comment, :bulk_price_lot, :bulk_price_sf_avg, :adj_bulk_sale_price, :ind_sale_pct_discount, :report_price_lot)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".LAND_TABLE." SET type_land_radio=:type_land_radio, type_residential_land=:type_residential_land, unit_lot_type=:unit_lot_type, no_lots=:no_lots, unadj_sale_price=:unadj_sale_price, lot_complete_date=:lot_complete_date, fut_avg_home_price=:fut_avg_home_price, fut_avg_home_price2=:fut_avg_home_price2, lot_home_price_ratio=:lot_home_price_ratio, unit_density_net_acre=:unit_density_net_acre, hard_cost_lot=:hard_cost_lot, off_site_imp=:off_site_imp, fut_finish_size_range=:fut_finish_size_range, fut_finish_size_avg=:fut_finish_size_avg, value_entitle=:value_entitle, inc_entitlement=:inc_entitlement, value_entitlement_lot=:value_entitlement_lot, site_amenities=:site_amenities, proj_fut_avg_finish_price=:proj_fut_avg_finish_price, adj_price_finish_with=:adj_price_finish_with, sale_price_lot_with=:sale_price_lot_with, sale_price_net_acre_with=:sale_price_net_acre_with, price_net_sf_with=:price_net_sf_with, adj_price_finished_wo=:adj_price_finished_wo, sale_price_lot_wo=:sale_price_lot_wo, sale_price_net_acre_wo=:sale_price_net_acre_wo, price_net_sf_wo=:price_net_sf_wo, ind_lot_nos=:ind_lot_nos, finish_lot_size_range=:finish_lot_size_range, finish_lot_size_sfba=:finish_lot_size_sfba, finish_lot_size_sf=:finish_lot_size_sf, lot_topography=:lot_topography, project_amenities=:project_amenities, original_price=:original_price, other_lot_comment=:other_lot_comment, bulk_price_lot=:bulk_price_lot, bulk_price_sf_avg=:bulk_price_sf_avg, adj_bulk_sale_price=:adj_bulk_sale_price, ind_sale_pct_discount=:ind_sale_pct_discount, report_price_lot=:report_price_lot WHERE ".LAND_TABLE.".FK_ReportID=:FK_ReportID");
            }
        
            $stmt->bindValue(':type_land_radio',$landsales->getType_land_radio(),PDO::PARAM_INT);
            $stmt->bindValue(':type_residential_land',$landsales->getType_residential_land(),PDO::PARAM_INT);
            $stmt->bindValue(':unit_lot_type',$landsales->getUnit_lot_type(),PDO::PARAM_STR);
            $stmt->bindValue(':no_lots',$landsales->getNo_lots(),PDO::PARAM_INT);
            $stmt->bindValue(':unadj_sale_price',$landsales->getUnadj_sale_price(),PDO::PARAM_INT);
            $stmt->bindValue(':lot_complete_date',$landsales->getLot_complete_date(),PDO::PARAM_STR);
            $stmt->bindValue(':fut_avg_home_price',$landsales->getFut_avg_home_price(),PDO::PARAM_STR);
            $stmt->bindValue(':fut_avg_home_price2',$landsales->getFut_avg_home_price2(),PDO::PARAM_STR);
            $stmt->bindValue(':lot_home_price_ratio',$landsales->getLot_home_price_ratio(),PDO::PARAM_STR);
            $stmt->bindValue(':unit_density_net_acre',$landsales->getUnit_density_net_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':hard_cost_lot',$landsales->getHard_cost_lot(),PDO::PARAM_STR);
            $stmt->bindValue(':off_site_imp',$landsales->getOff_site_imp(),PDO::PARAM_STR);
            $stmt->bindValue(':fut_finish_size_range',$landsales->getFut_finish_size_range(),PDO::PARAM_STR);
            $stmt->bindValue(':fut_finish_size_avg',$landsales->getFut_finish_size_avg(),PDO::PARAM_STR);
            $stmt->bindValue(':value_entitle',$landsales->getValue_entitle(),PDO::PARAM_INT);
            $stmt->bindValue(':inc_entitlement',$landsales->getInc_entitlement(),PDO::PARAM_INT);
            $stmt->bindValue(':value_entitlement_lot',$landsales->getValue_entitlement_lot(),PDO::PARAM_INT);
            $stmt->bindValue(':site_amenities',$landsales->getSite_amenities(),PDO::PARAM_STR);
            $stmt->bindValue(':proj_fut_avg_finish_price',$landsales->getProj_fut_avg_finish_price(),PDO::PARAM_STR);
            $stmt->bindValue(':adj_price_finish_with',$landsales->getAdj_price_finish_with(),PDO::PARAM_INT);
            $stmt->bindValue(':sale_price_lot_with',$landsales->getSale_price_lot_with(),PDO::PARAM_INT);
            $stmt->bindValue(':sale_price_net_acre_with',$landsales->getSale_price_net_acre_with(),PDO::PARAM_INT);
            $stmt->bindValue(':price_net_sf_with',$landsales->getPrice_net_sf_with(),PDO::PARAM_STR);
            $stmt->bindValue(':adj_price_finished_wo',$landsales->getAdj_price_finished_wo(),PDO::PARAM_INT);
            $stmt->bindValue(':sale_price_lot_wo',$landsales->getSale_price_lot_wo(),PDO::PARAM_INT);
            $stmt->bindValue(':sale_price_net_acre_wo',$landsales->getSale_price_net_acre_wo(),PDO::PARAM_INT);
            $stmt->bindValue(':price_net_sf_wo',$landsales->getPrice_net_sf_wo(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_lot_nos',$landsales->getInd_lot_nos(),PDO::PARAM_STR);
            $stmt->bindValue(':finish_lot_size_range',$landsales->getFinish_lot_size_range(),PDO::PARAM_STR);
            $stmt->bindValue(':finish_lot_size_sfba',$landsales->getFinish_lot_size_sfba(),PDO::PARAM_STR);
            $stmt->bindValue(':finish_lot_size_sf',$landsales->getFinish_lot_size_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':lot_topography',$landsales->getLot_topography(),PDO::PARAM_INT);
            $stmt->bindValue(':project_amenities',$landsales->getProject_amenities(),PDO::PARAM_STR);
            $stmt->bindValue(':original_price',$landsales->getOriginal_price(),PDO::PARAM_STR);
            $stmt->bindValue(':other_lot_comment',$landsales->getOther_lot_comment(),PDO::PARAM_STR);
            $stmt->bindValue(':bulk_price_lot',$landsales->getBulk_price_lot(),PDO::PARAM_INT);
            $stmt->bindValue(':bulk_price_sf_avg',$landsales->getBulk_price_sf_avg(),PDO::PARAM_STR);
            $stmt->bindValue(':adj_bulk_sale_price',$landsales->getAdj_bulk_sale_price(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_sale_pct_discount',$landsales->getInd_sale_pct_discount(),PDO::PARAM_STR);
            $stmt->bindValue(':report_price_lot',$landsales->getReport_price_lot(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$landsales->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
        
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".SALES_TRANSACTIONS_TABLE." (FK_ReportID, property_appraised, mc_job, appraiser_name, appraiser_name_two, grantor, grantee, land_alloc_sale, sale_price, less_alloc_imp_price, improve_value_source, alloc_land_value, prop_rights_conv, interest_conv, conv_doc_type, conv_doc_rec_no, record_date, record_date_two, sale_status, market_time, current_use, proposed_use_change, proposed_use_desc, fee_equiv_price, fee_simple_equiv_price, cash_equiv_price, type_finance, list_price_avail, list_price, list_price_change, datasource, inspect_date, confirm_date, inspect_type, mc_file_no, confirm_1_source, relationship_1, confirm_2_souce, relationship_2, market_flyer, fin_term_adj, fin_term_adj_desc, cond_sale_adj, cond_sale_desc, demo_cost, demo_cost_desc, onsite_extra_cost, onsite_extra_cost_desc, offsite_develop, offsite_develop_desc, broker_cost, broker_cost_desc, eff_sale_price_stab, adj_price_comment, inc_ffe, value_ffe, desc_ffe, adj_price_acre_gross, adj_price_acre_net, adj_price_sf_gross, adj_price_sf_net, adj_price_sf_far, adjhomesite, sale_comments, conf_comments, confirm1,confirm2)
                VALUES  (:FK_ReportID, :property_appraised, :mc_job, :appraiser_name, :appraiser_name_two, :grantor, :grantee, :land_alloc_sale, :sale_price, :less_alloc_imp_price, :improve_value_source, :alloc_land_value, :prop_rights_conv, :interest_conv, :conv_doc_type, :conv_doc_rec_no, :record_date, :record_date_two, :sale_status, :market_time, :current_use, :proposed_use_change, :proposed_use_desc, :fee_equiv_price, :fee_simple_equiv_price, :cash_equiv_price, :type_finance, :list_price_avail, :list_price, :list_price_change, :datasource, :inspect_date, :confirm_date, :inspect_type, :mc_file_no, :confirm_1_source, :relationship_1, :confirm_2_souce, :relationship_2, :market_flyer, :fin_term_adj, :fin_term_adj_desc, :cond_sale_adj, :cond_sale_desc, :demo_cost, :demo_cost_desc, :onsite_extra_cost, :onsite_extra_cost_desc, :offsite_develop, :offsite_develop_desc, :broker_cost, :broker_cost_desc, :eff_sale_price_stab, :adj_price_comment, :inc_ffe, :value_ffe, :desc_ffe, :adj_price_acre_gross, :adj_price_acre_net, :adj_price_sf_gross, :adj_price_sf_net, :adj_price_sf_far, :adjhomesite, :sale_comments, :conf_comments, :confirm1, :confirm2)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".SALES_TRANSACTIONS_TABLE." SET property_appraised=:property_appraised, mc_job=:mc_job, appraiser_name=:appraiser_name, appraiser_name_two=:appraiser_name_two, grantor=:grantor, grantee=:grantee, land_alloc_sale=:land_alloc_sale, sale_price=:sale_price, less_alloc_imp_price=:less_alloc_imp_price, improve_value_source=:improve_value_source, alloc_land_value=:alloc_land_value, prop_rights_conv=:prop_rights_conv, interest_conv=:interest_conv, conv_doc_type=:conv_doc_type, conv_doc_rec_no=:conv_doc_rec_no, record_date=:record_date, record_date_two=:record_date_two, sale_status=:sale_status, market_time=:market_time, current_use=:current_use, proposed_use_change=:proposed_use_change, proposed_use_desc=:proposed_use_desc, fee_equiv_price=:fee_equiv_price, fee_simple_equiv_price=:fee_simple_equiv_price, cash_equiv_price=:cash_equiv_price, type_finance=:type_finance, list_price_avail=:list_price_avail, list_price=:list_price, list_price_change=:list_price_change, datasource=:datasource, inspect_date=:inspect_date, confirm_date=:confirm_date, inspect_type=:inspect_type, mc_file_no=:mc_file_no, confirm_1_source=:confirm_1_source, relationship_1=:relationship_1, confirm_2_souce=:confirm_2_souce, relationship_2=:relationship_2, market_flyer=:market_flyer, fin_term_adj=:fin_term_adj, fin_term_adj_desc=:fin_term_adj_desc, cond_sale_adj=:cond_sale_adj, cond_sale_desc=:cond_sale_desc, demo_cost=:demo_cost, demo_cost_desc=:demo_cost_desc, onsite_extra_cost=:onsite_extra_cost, onsite_extra_cost_desc=:onsite_extra_cost_desc, offsite_develop=:offsite_develop, offsite_develop_desc=:offsite_develop_desc, broker_cost=:broker_cost, broker_cost_desc=:broker_cost_desc, eff_sale_price_stab=:eff_sale_price_stab, adj_price_comment=:adj_price_comment, inc_ffe=:inc_ffe, value_ffe=:value_ffe, desc_ffe=:desc_ffe, adj_price_acre_gross=:adj_price_acre_gross, adj_price_acre_net=:adj_price_acre_net, adj_price_sf_gross=:adj_price_sf_gross, adj_price_sf_net=:adj_price_sf_net, adj_price_sf_far=:adj_price_sf_far, adjhomesite=:adjhomesite, sale_comments=:sale_comments, conf_comments=:conf_comments, confirm1=:confirm1, confirm2=:confirm2 WHERE ".SALES_TRANSACTIONS_TABLE.".FK_ReportID=:FK_ReportID");
            }
        
            $stmt->bindValue(':property_appraised',$landsales->getProperty_appraised(),PDO::PARAM_INT);
            $stmt->bindValue(':mc_job',$landsales->getMc_job(),PDO::PARAM_STR);
            $stmt->bindValue(':appraiser_name',$landsales->getAppraiser_name(),PDO::PARAM_STR);
            $stmt->bindValue(':appraiser_name_two',$landsales->getAppraiser_name_two(),PDO::PARAM_STR);
            $stmt->bindValue(':grantor',$landsales->getGrantor(),PDO::PARAM_STR);
            $stmt->bindValue(':grantee',$landsales->getGrantee(),PDO::PARAM_STR);
            $stmt->bindValue(':land_alloc_sale',$landsales->getLand_alloc_sale(),PDO::PARAM_INT);
            $stmt->bindValue(':sale_price',$landsales->getSale_price(),PDO::PARAM_INT);
            $stmt->bindValue(':less_alloc_imp_price',$landsales->getLess_alloc_imp_price(),PDO::PARAM_INT);
            $stmt->bindValue(':improve_value_source',$landsales->getImprove_value_source(),PDO::PARAM_STR);
            $stmt->bindValue(':alloc_land_value',$landsales->getAlloc_land_value(),PDO::PARAM_INT);
            $stmt->bindValue(':prop_rights_conv',$landsales->getProp_rights_conv(),PDO::PARAM_INT);
            $stmt->bindValue(':interest_conv',$landsales->getInterest_conv(),PDO::PARAM_STR);
            $stmt->bindValue(':conv_doc_type',$landsales->getConv_doc_type(),PDO::PARAM_INT);
            $stmt->bindValue(':conv_doc_rec_no',$landsales->getConv_doc_rec_no(),PDO::PARAM_STR);
            $stmt->bindValue(':record_date',$landsales->getRecord_date(),PDO::PARAM_STR);
            $stmt->bindValue(':record_date_two',$landsales->getRecord_date_two(),PDO::PARAM_STR);
            $stmt->bindValue(':sale_status',$landsales->getSale_status(),PDO::PARAM_INT);
            $stmt->bindValue(':market_time',$landsales->getMarket_time(),PDO::PARAM_STR);
            $stmt->bindValue(':current_use',$landsales->getCurrent_use(),PDO::PARAM_STR);
            $stmt->bindValue(':proposed_use_change',$landsales->getProposed_use_change(),PDO::PARAM_INT);
            $stmt->bindValue(':proposed_use_desc',$landsales->getProposed_use_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':fee_equiv_price',$landsales->getFee_equiv_price(),PDO::PARAM_INT);
            $stmt->bindValue(':fee_simple_equiv_price',$landsales->getFee_simple_equiv_price(),PDO::PARAM_INT);
            $stmt->bindValue(':cash_equiv_price',$landsales->getCash_equiv_price(),PDO::PARAM_INT);
            $stmt->bindValue(':type_finance',$landsales->getType_finance(),PDO::PARAM_STR);
            $stmt->bindValue(':list_price_avail',$landsales->getList_price_avail(),PDO::PARAM_INT);
            $stmt->bindValue(':list_price',$landsales->getList_price(),PDO::PARAM_INT);
            $stmt->bindValue(':list_price_change',$landsales->getList_price_change(),PDO::PARAM_STR);
            $stmt->bindValue(':datasource',$landsales->getDatasource(),PDO::PARAM_STR);
            $stmt->bindValue(':inspect_date',$landsales->getInspect_date(),PDO::PARAM_STR);
            $stmt->bindValue(':confirm_date',$landsales->getConfirm_date(),PDO::PARAM_STR);
            $stmt->bindValue(':inspect_type',$landsales->getInspect_type(),PDO::PARAM_INT);
            $stmt->bindValue(':mc_file_no',$landsales->getMc_file_no(),PDO::PARAM_STR);
            $stmt->bindValue(':confirm_1_source',$landsales->getConfirm_1_source(),PDO::PARAM_STR);
            $stmt->bindValue(':relationship_1',$landsales->getRelationship_1(),PDO::PARAM_STR);
            $stmt->bindValue(':confirm_2_souce',$landsales->getConfirm_2_souce(),PDO::PARAM_STR);
            $stmt->bindValue(':relationship_2',$landsales->getRelationship_2(),PDO::PARAM_STR);
            $stmt->bindValue(':market_flyer',$landsales->getMarket_flyer(),PDO::PARAM_STR);
            $stmt->bindValue(':fin_term_adj',$landsales->getFin_term_adj(),PDO::PARAM_INT);
            $stmt->bindValue(':fin_term_adj_desc',$landsales->getFin_term_adj_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':cond_sale_adj',$landsales->getCond_sale_adj(),PDO::PARAM_INT);
            $stmt->bindValue(':cond_sale_desc',$landsales->getCond_sale_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':demo_cost',$landsales->getDemo_cost(),PDO::PARAM_INT);
            $stmt->bindValue(':demo_cost_desc',$landsales->getDemo_cost_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':onsite_extra_cost',$landsales->getOnsite_extra_cost(),PDO::PARAM_INT);
            $stmt->bindValue(':onsite_extra_cost_desc',$landsales->getOnsite_extra_cost_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':offsite_develop',$landsales->getOffsite_develop(),PDO::PARAM_INT);
            $stmt->bindValue(':offsite_develop_desc',$landsales->getOffsite_develop_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':broker_cost',$landsales->getBroker_cost(),PDO::PARAM_INT);
            $stmt->bindValue(':broker_cost_desc',$landsales->getBroker_cost_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_sale_price_stab',$landsales->getEff_sale_price_stab(),PDO::PARAM_INT);
            $stmt->bindValue(':adj_price_comment',$landsales->getAdj_price_comment(),PDO::PARAM_STR);
            $stmt->bindValue(':inc_ffe',$landsales->getInc_ffe(),PDO::PARAM_INT);
            $stmt->bindValue(':value_ffe',$landsales->getValue_ffe(),PDO::PARAM_INT);
            $stmt->bindValue(':desc_ffe',$landsales->getDesc_ffe(),PDO::PARAM_STR);
            $stmt->bindValue(':adj_price_acre_gross',$landsales->getAdj_price_acre_gross(),PDO::PARAM_INT);
            $stmt->bindValue(':adj_price_acre_net',$landsales->getAdj_price_acre_net(),PDO::PARAM_INT);
            $stmt->bindValue(':adj_price_sf_gross',$landsales->getAdj_price_sf_gross(),PDO::PARAM_STR);
            $stmt->bindValue(':adj_price_sf_net',$landsales->getAdj_price_sf_net(),PDO::PARAM_STR);
            $stmt->bindValue(':adj_price_sf_far',$landsales->getAdj_price_sf_far(),PDO::PARAM_STR);
            $stmt->bindValue(':adjhomesite',$landsales->getAdjhomesite(),PDO::PARAM_INT);
            $stmt->bindValue(':sale_comments',$landsales->getSale_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':conf_comments',$landsales->getConf_comments(),PDO::PARAM_STR);
			$stmt->bindValue(':confirm1',$landsales->getConfirm1(),PDO::PARAM_INT);
            $stmt->bindValue(':confirm2',$landsales->getConfirm2(),PDO::PARAM_INT);
            $stmt->bindValue(':FK_ReportID',$landsales->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
            $allAssessed = array();
			if(isset($_POST['assessedids'])){
				if(stristr($_POST['assessedids'],",")!==false){
					$allAssessed = explode(",",$_POST['assessedids']);
				}else{
					$allAssessed[] = $_POST['assessedids'];
				}
			}
			
			$assessedvalues = $landsales->getAssessedvalues();
	
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
				$stmt->bindValue(':FK_ReportID',$landsales->getId(),PDO::PARAM_INT);

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
            
            $directory = "../comp_images/".$landsales->getId();
            if (!is_dir($directory)){
                mkdir($directory, 0755, true);
            }

            $images = array();
			foreach ($_FILES['images']['name'] as $key => $val ) {
                $upload_dir = "../comp_images/" . $landsales->getId() . "/";
                $upload_image = $upload_dir.$_FILES['images']['name'][$key];
                $file_name = $_FILES['images']['name'][$key];
                if (move_uploaded_file($_FILES['images']['tmp_name'][$key],$upload_image)) {                
					$mediaUtilities->imageTransformations($file_name,$upload_dir,400,400,100,"","","resize",true);
                    $images[] = $upload_image;
                    $FK_ReportID = $landsales->getId();
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
				$FK_ReportID = $landsales->getId();
				$stmt = $this->db->prepare("UPDATE propphotos SET propphotos.order = '".($p+1)."' WHERE FK_ReportID = '".$FK_ReportID."' AND photopath='".$picOrder[$p]."'");
				$stmt->execute(); 
			}
        
            $stmt = $this->db->prepare("DELETE FROM ".DOC_LINKS." WHERE FK_ReportID=:FK_ReportID");
            $stmt->bindValue(':FK_ReportID',$landsales->getId(),PDO::PARAM_INT);
            $stmt->execute();

            for($d=0;$d<count($landsales->getDocData());$d++){
                $stmt = $this->db->prepare("INSERT INTO ".DOC_LINKS." (boxurl, file_label,FK_ReportID) VALUES  (:boxurl,:file_label,:FK_ReportID)");
                $stmt->bindValue(':boxurl',$landsales->getDocData()[$d]->boxurl,PDO::PARAM_STR);
                $stmt->bindValue(':file_label',$landsales->getDocData()[$d]->file_label,PDO::PARAM_STR);
                $stmt->bindValue(':FK_ReportID',$landsales->getId(),PDO::PARAM_INT);
                $stmt->execute();
            }
        
            $this->db->commit();
            
        }catch (PDOException $e) {
            print_r($e);
            $this->db->rollBack(); //cancel db changes if something goes wrong
            return $landsales;
            die();
        }
        
        return $landsales;
    }
}
?>