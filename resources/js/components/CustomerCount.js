import React, { useCallback, useEffect, useRef, useState } from 'react';
import ReactDOM from 'react-dom/client';
import { getRequest } from '../helpers/axios';
import { endpoints } from '../constants';

export default function CustoemrCount() {

    const [counts, setCounts] = useState({
        total_active: 0,
        total_app_customer_type: 0,
        total_onboarding_count: 0,
        total_pending: 0
    });

    const customerType = useRef(window.location.pathname.split("/")[4]);

    const initLoading = useCallback(async () => {
        const result = await getRequest(`${endpoints.customerCount}/${customerType.current}`);

        if (result.status === 201 || result.status === 200) {
            setCounts(result.data);
        }
    }, []);

    useEffect(() => {
        initLoading();
    }, [initLoading]);

    return (
        <div className="row">
            <div className="col-12 col-md-3 col-lg-3 mt-3">
                <div className="card card-count-info">
                    <div className="card-body">
                        <div className="d-flex flex-column align-items-start justify-content-start">
                            <div className="d-flex flex-row align-items-start justify-content-between">
                                <i className="bi bi-person-fill-check count-icon"></i>
                                <div className="d-flex flex-column align-items-start justify-content-start count-number">
                                    <span> {counts.total_onboarding_count} </span>
                                    <small> ONBOARDING </small>
                                </div>
                            </div>
                            <span className="card-label"> App Customer Accounts </span>
                        </div>
                    </div>
                </div>
            </div>

            <div className="col-12 col-md-3 col-lg-3 mt-3">
                <div className="card card-count-warning">
                    <div className="card-body">
                        <div className="d-flex flex-column align-items-start justify-content-start">
                            <div className="d-flex flex-row align-items-start justify-content-between">
                                <i className="bi bi-person-fill-check count-icon"></i>
                                <div className="d-flex flex-column align-items-start justify-content-start count-number">
                                    <span> {counts.total_app_customer_type} </span>
                                    <small> {customerType.current} </small>
                                </div>
                            </div>
                            <span className="card-label"> App Customer Accounts </span>
                        </div>
                    </div>
                </div>
            </div>

            <div className="col-12 col-md-3 col-lg-3 mt-3">
                <div className="card card-count-success">
                    <div className="card-body">
                        <div className="d-flex flex-column align-items-start justify-content-start">
                            <div className="d-flex flex-row align-items-start justify-content-between">
                                <i className="bi bi-person-fill-check count-icon"></i>
                                <div className="d-flex flex-column align-items-start justify-content-start count-number">
                                    <span> {counts.total_active} </span>
                                    <small> ACTIVE </small>
                                </div>
                            </div>
                            <span className="card-label"> App Customer Accounts </span>
                        </div>
                    </div>
                </div>
            </div>

            <div className="col-12 col-md-3 col-lg-3 mt-3">
                <div className="card card-count-danger">
                    <div className="card-body">
                        <div className="d-flex flex-column align-items-start justify-content-start">
                            <div className="d-flex flex-row align-items-start justify-content-between">
                                <i className="bi bi-person-fill-check count-icon"></i>
                                <div className="d-flex flex-column align-items-start justify-content-start count-number">
                                    <span> {counts.total_pending} </span>
                                    <small> PENDING </small>
                                </div>
                            </div>
                            <span className="card-label"> App Customer Accounts </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

if (document.getElementById('customer-count')) {
    const root = ReactDOM.createRoot(document.getElementById('customer-count'));
    root.render(<CustoemrCount />);
}