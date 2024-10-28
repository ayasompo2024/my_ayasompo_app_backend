import { InputText } from "primereact/inputtext";
import { useCallback, useEffect, useRef, useState } from "react"
import { payloadHandler } from "../helpers/utilities";
import { Toast } from "primereact/toast";
import { Button } from "primereact/button";
import { customerServices } from "../services/customerServices";

export const EmployeeCustomerDetail = ({ dataSource }) => {

    const [employee, setEmployee] = useState(null);
    const [payload, setPayload] = useState({
        customer_id: '',
        code: '',
        designation: '',
        department: '',
        email: '',
        office_phone: '',
        office_address: ''
    });
    const [loading, setLoading] = useState(false);

    const toast = useRef(toast);

    const updateEmployeeInfo = async () => {
        setLoading(true);
        const result = await customerServices.updateEmployeeInfo(payload.id, payload);

        if (result.status === 200 || result.status === 201) {
            toast.current.show({ severity: 'success', summary: 'Success', detail: "Record is updated successfully", life: 3000 });
        }

        setLoading(false);
    }

    const mount = useCallback(async () => {
        if (dataSource) {
            setEmployee(dataSource);
            setPayload(dataSource);
        }
    }, [dataSource]);

    useEffect(() => {
        mount();
    }, [mount]);

    return (
        <>
            {employee && (
                <div className="row">
                    <div className="col-12 col-md-3 col-lg-3 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Customer ID </label>
                            <InputText
                                placeholder="Enter Customer ID"
                                value={payload.customer_id ?? ""}
                                disabled={true}
                                readOnly={true}
                                onChange={(e) => payloadHandler(payload, e.target.value, "customer_id", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-3 col-lg-3 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Code </label>
                            <InputText
                                placeholder="Enter Code"
                                value={payload.code ?? ""}
                                disabled={true}
                                readOnly={true}
                                onChange={(e) => payloadHandler(payload, e.target.value, "code", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-6 col-lg-6 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Designation </label>
                            <InputText
                                placeholder="Enter Designation"
                                value={payload.designation ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "designation", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-6 col-lg-6 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Department </label>
                            <InputText
                                placeholder="Enter Department"
                                value={payload.department ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "department", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-6 col-lg-6 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Email </label>
                            <InputText
                                placeholder="Enter Email"
                                value={payload.email ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "email", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-6 col-lg-6 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Office phone </label>
                            <InputText
                                placeholder="Enter Office Phone"
                                value={payload.office_phone ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "office_phone", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-6 col-lg-6 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Office Address </label>
                            <InputText
                                placeholder="Enter Office Address"
                                value={payload.office_address ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "office_address", (updatePayload) => {
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
                                onClick={() => updateEmployeeInfo()}
                            />
                        </div>
                    </div>

                    <Toast ref={toast} />
                </div>
            )}
        </>
    )
}