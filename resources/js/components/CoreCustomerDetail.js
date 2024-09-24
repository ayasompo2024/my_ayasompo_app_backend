import { useCallback, useEffect, useState } from "react"

export const CoreCustomerDetail =({ dataSource }) => {

    const [coreCustomer, setCoreCustomer] = useState(null);

    const mount = useCallback(async () => {
        if(dataSource) {
            setCoreCustomer(dataSource);
        }
    },[dataSource]);

    useEffect(() => {
        mount();
    }, [mount]);

    return(
        <>
            { coreCustomer && (
                <div className="row">
                    <div className="col-12 col-md-6 col-lg-6">
                        <div className="w-full d-flex flex-row align-items-center justify-content-between">
                            <span className="normal-text"> Core ID </span>
                            <span className="normal-text"> {coreCustomer.id} </span>
                        </div>

                        <div className="w-full d-flex flex-row align-items-center justify-content-between">
                            <span className="normal-text"> App Customer ID </span>
                            <span className="normal-text"> {coreCustomer.app_customer_id} </span>
                        </div>

                        <div className="w-full d-flex flex-row align-items-center justify-content-between">
                            <span className="normal-text"> Customer Code </span>
                            <span className="normal-text"> {coreCustomer.customer_code} </span>
                        </div>

                        <div className="w-full d-flex flex-row align-items-center justify-content-between">
                            <span className="normal-text"> Customer Name </span>
                            <span className="normal-text"> {coreCustomer.customer_name} </span>
                        </div>

                        <div className="w-full d-flex flex-row align-items-center justify-content-between">
                            <span className="normal-text"> Customer NRC </span>
                            <span className="normal-text"> {coreCustomer.customer_nrc} </span>
                        </div>

                        <div className="w-full d-flex flex-row align-items-center justify-content-between">
                            <span className="normal-text"> Customer Phone </span>
                            <span className="normal-text"> {coreCustomer.customer_phoneno} </span>
                        </div>

                        <div className="w-full d-flex flex-row align-items-center justify-content-between">
                            <span className="normal-text"> Customer Type </span>
                            <span className="normal-text"> {coreCustomer.customer_type} </span>
                        </div>

                        <div className="w-full d-flex flex-row align-items-center justify-content-between">
                            <span className="normal-text"> Customer Email </span>
                            <span className="normal-text"> {coreCustomer.email} </span>
                        </div>
                    </div>
                </div>
            )}
        </>
    )
}