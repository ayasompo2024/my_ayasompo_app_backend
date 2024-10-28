import { InputText } from "primereact/inputtext";
import { useCallback, useEffect, useRef, useState } from "react"
import { payloadHandler } from "../helpers/utilities";
import { customerServices } from "../services/customerServices";
import { Toast } from "primereact/toast";
import { Button } from "primereact/button";

export const CoreCustomerDetail = ({ dataSource }) => {

    const [coreCustomer, setCoreCustomer] = useState(null);
    const [payload, setPayload] = useState({
        id: "",
        app_customer_id: "",
        customer_code: "",
        customer_name: "",
        customer_nrc: "",
        customer_phoneno: "",
        customer_type: "",
        email: "",
        address: "",

    });
    const [loading, setLoading] = useState(false);

    const toast = useRef(toast);

    const updateCoreCustomerInfo = async () => {
        setLoading(true);
        const result = await customerServices.updateCoreInfo(payload.id, payload);

        if (result.status === 200 || result.status === 201) {
            toast.current.show({ severity: 'success', summary: 'Success', detail: "Record is updated successfully", life: 3000 });
        }

        setLoading(false);
    }

    const mount = useCallback(async () => {
        if (dataSource) {
            setCoreCustomer(dataSource);
            setPayload(dataSource);
        }
    }, [dataSource]);

    useEffect(() => {
        mount();
    }, [mount]);

    return (
        <>
            {coreCustomer && (
                <div className="row">
                    <div className="col-12 col-md-3 col-lg-3 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Core ID </label>
                            <InputText
                                placeholder="Enter Core ID"
                                value={payload.id ?? ""}
                                disabled={true}
                                readOnly={true}
                                onChange={(e) => payloadHandler(payload, e.target.value, "id", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-3 col-lg-3 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> App Customer ID </label>
                            <InputText
                                placeholder="Enter App Customer ID"
                                value={payload.app_customer_id ?? ""}
                                disabled={true}
                                readOnly={true}
                                onChange={(e) => payloadHandler(payload, e.target.value, "app_customer_id", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-3 col-lg-3 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Customer Code </label>
                            <InputText
                                placeholder="Enter App Customer ID"
                                value={payload.customer_code ?? ""}
                                disabled={true}
                                readOnly={true}
                                onChange={(e) => payloadHandler(payload, e.target.value, "customer_code", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-3 col-lg-3 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Customer Type </label>
                            <InputText
                                placeholder="Enter Customer Type"
                                value={payload.customer_type ?? ""}
                                disabled={true}
                                readOnly={true}
                                onChange={(e) => payloadHandler(payload, e.target.value, "customer_type", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-3 col-lg-3 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Customer Name </label>
                            <InputText
                                placeholder="Enter Customer Name"
                                value={payload.customer_name ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "customer_name", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-3 col-lg-3 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Customer NRC </label>
                            <InputText
                                placeholder="Enter Customer NRC"
                                value={payload.customer_nrc ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "customer_nrc", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-3 col-lg-3 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Customer Phone </label>
                            <InputText
                                placeholder="Enter Customer Phone"
                                value={payload.customer_phoneno ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "customer_phoneno", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-3 col-lg-3 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Customer Email </label>
                            <InputText
                                placeholder="Enter Customer Email"
                                value={payload.email ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "email", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Customer Address </label>
                            <InputText
                                placeholder="Enter CustomerAddress"
                                value={payload.address ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "address", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 mt-3">
                        <div className="d-flex flex-row justify-content-end align-items-center">
                            <Button
                                severity="danger"
                                label="Update"
                                size="small"
                                style={{ borderRadius: "5px" }}
                                disabled={loading}
                                loading={loading}
                                onClick={() => updateCoreCustomerInfo()}
                            />
                        </div>
                    </div>

                    <Toast ref={toast} />
                </div>
            )}
        </>
    )
}