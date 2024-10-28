import { Calendar } from "primereact/calendar";
import { useCallback, useEffect, useRef, useState } from "react"
import { payloadHandler } from "../helpers/utilities";
import { customerServices } from "../services/customerServices";
import { Button } from "primereact/button";
import { Toast } from "primereact/toast";
import { InputText } from "primereact/inputtext";
import moment from "moment";

export const AgentCustomerDetail = ({ dataSource }) => {

    const [agent, setAgent] = useState(null);
    const [loading, setLoading] = useState(false);
    const [payload, setPayload] = useState({
        customer_id: '',
        agent_name: '',
        license_no: '',
        agent_type: '',
        expired_date: '',
        email: '',
        achievement: '',
        title: ''
    });

    const toast = useRef(toast);

    const updateAgentInfo = async () => {
        setLoading(true);
        const result = await customerServices.updateAgentInfo(payload.id, payload);

        if (result.status === 200 || result.status === 201) {
            toast.current.show({ severity: 'success', summary: 'Success', detail: "Record is updated successfully", life: 3000 });
        }

        setLoading(false);
    }

    const mount = useCallback(async () => {
        if (dataSource) {
            const updatePayload = {...dataSource};
            updatePayload.expired_date = moment(dataSource.expired_date).format("MM/DD/YYYY");
            setAgent(dataSource);
            setPayload(updatePayload);
        }
    }, [dataSource]);

    useEffect(() => {
        mount();
    }, [mount]);

    return (
        <>
            {agent && (
                <div className="row">

                    <div className="col-12 col-md-4 col-lg-4 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Customer ID </label>
                            <InputText
                                placeholder="Enter Core ID"
                                value={payload.customer_id ?? ""}
                                disabled={true}
                                readOnly={true}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-4 col-lg-4 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Agent Name </label>
                            <InputText
                                placeholder="Enter Agent Name"
                                value={payload.agent_name ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "agent_name", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-4 col-lg-4 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> License No </label>
                            <InputText
                                placeholder="Enter License No"
                                value={payload.license_no ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "license_no", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-4 col-lg-4 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Agent Type </label>
                            <InputText
                                placeholder="Enter Agent Type"
                                value={payload.agent_type ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "agent_type", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-4 col-lg-4 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Expired Date ({moment(agent.expired_date).format("MM/DD/YYYY")}) </label>
                            <Calendar
                                placeholder="Choose Expired Date"
                                value={payload.expired_date ?? new Date()}
                                dateFormat="mm/dd/yy"
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.value, "expired_date", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-4 col-lg-4 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Email </label>
                            <InputText
                                placeholder="Enter Agent Type"
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
                            <label className="label-text"> Achievement </label>
                            <InputText
                                placeholder="Enter Achievement"
                                value={payload.achievement ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "achievement", (updatePayload) => {
                                    setPayload(updatePayload);
                                })}
                            />
                        </div>
                    </div>

                    <div className="col-12 col-md-6 col-lg-6 mt-3">
                        <div className="d-flex flex-column">
                            <label className="label-text"> Title </label>
                            <InputText
                                placeholder="Enter Title"
                                value={payload.title ?? ""}
                                disabled={loading}
                                onChange={(e) => payloadHandler(payload, e.target.value, "title", (updatePayload) => {
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
                                onClick={() => updateAgentInfo()}
                            />
                        </div>
                    </div>

                    <Toast ref={toast} />
                </div>
            )}
        </>
    )
}