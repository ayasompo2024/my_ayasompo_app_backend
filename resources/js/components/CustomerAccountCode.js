import moment from "moment";
import { useCallback, useEffect, useState } from "react"

export const CustomerAccountCode = ({ dataSource }) => {

    const [codes, setCode] = useState([]);

    const mount = useCallback(async () => {
        if (dataSource) {
            setCode(dataSource);
        }
    }, [dataSource]);

    useEffect(() => {
        mount();
    }, [mount]);

    return (
        <>
            {codes && codes.map((value, index) => {
                return (
                    <div className="row" key={`code_key_id_${index}`}>
                        <div className="col-12 col-md-6 col-lg-6">
                            <div className="row">
                                <span className="col-12 col-md-4 col-lg-4 normal-text"> Customer ID </span>
                                <span className="col-12 col-md-8 col-lg-8 normal-text"> {value.customer_id} </span>
                            </div>

                            <div className="row">
                                <span className="col-12 col-md-4 col-lg-4 normal-text"> Code </span>
                                <span className="col-12 col-md-8 col-lg-8 normal-text"> {value.code} </span>
                            </div>

                            <div className="row">
                                <span className="col-12 col-md-4 col-lg-4 normal-text"> Created At </span>
                                <span className="col-12 col-md-8 col-lg-8 normal-text"> {moment(value.created_at).format("DD/MM/YYYY hh:mm:ss")} </span>
                            </div>

                            <div className="row">
                                <span className="col-12 col-md-4 col-lg-4 normal-text"> Updated At </span>
                                <span className="col-12 col-md-8 col-lg-8 normal-text"> {moment(value.updated_at).format("DD/MM/YYYY hh:mm:ss")} </span>
                            </div>
                        </div>
                    </div>
                )
            })}
        </>
    )
}