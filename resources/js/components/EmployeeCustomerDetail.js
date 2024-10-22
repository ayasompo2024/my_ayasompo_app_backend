import { useCallback, useEffect, useState } from "react"

export const EmployeeCustomerDetail =({ dataSource }) => {

    const [employee, setEmployee] = useState(null);

    const mount = useCallback(async () => {
        if(dataSource) {
            setEmployee(dataSource);
        }
    },[dataSource]);

    useEffect(() => {
        mount();
    }, [mount]);

    return(
        <>
            { employee && (
                <div className="row">
                    <div className="col-12 col-md-6 col-lg-6">
                        <div className="row">
                            <span className="col-12 col-md-4 normal-text"> Customer ID </span>
                            <span className="col-12 col-md-8 normal-text"> {employee.customer_id} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 normal-text"> Code </span>
                            <span className="col-12 col-md-8 normal-text"> {employee.code} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 normal-text"> Department </span>
                            <span className="col-12 col-md-8 normal-text"> {employee.department} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 normal-text"> Designation </span>
                            <span className="col-12 col-md-8 normal-text"> {employee.designation} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 normal-text"> Email </span>
                            <span className="col-12 col-md-8 normal-text"> {employee.email} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 normal-text"> Office Address </span>
                            <span className="col-12 col-md-8 normal-text"> {employee.office_address} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 normal-text"> Office Phone </span>
                            <span className="col-12 col-md-8 normal-text"> {employee.office_phone} </span>
                        </div>
                    </div>
                </div>
            )}
        </>
    )
}