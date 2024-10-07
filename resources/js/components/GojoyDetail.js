import ReactDOM from 'react-dom/client';
import React, { useRef, useState, useCallback, useEffect } from 'react';
import { Dropdown } from 'primereact/dropdown';
import { InputText } from 'primereact/inputtext';
import { Calendar } from 'primereact/calendar';
import { ConfirmDialog } from 'primereact/confirmdialog';
import { Toast } from 'primereact/toast';
import { payloadHandler } from '../helpers/utilities';
import { gojoyService } from '../services/gojoyService';
import { Button } from 'primereact/button';
import moment from 'moment';

export default function GojoyDetail() {

    const [loading, setLoading] = useState(false);
    const [selectedStatus, setSelectedStatus] = useState("");
    const [payload, setPayload] = useState({
        full_name: "",
        nrc: '',
        dob: '',
        mobile_number: '',
        email: '',
        beneficiary_name: '',
        beneficiary_contact: '',
        tag_name: '',
        status: ''
    });

    const toast = useRef(null);
    const id = useRef(window.location.pathname.split("/")[3]);
    const generalStatus = useRef([
        { name: "ACTIVE", code: "ACTIVE" },
        { name: "DISABLE", code: "DISABLE" }
    ]);

    /** OnChange Status Handler */
    const onStatusChangeHandler = async (e) => {
        setSelectedStatus(e);
        payloadHandler(payload, e.code, 'status', (updatePayload) => {
            setPayload(updatePayload);
        })
    }

    /** Update Gojoy */
    const updateGojoy = async () => {
        setLoading(true);
        const result = await gojoyService.update(payload, id.current);

        if(result.status === 200 || result.status === 201) {
            toast.current.show({ severity: 'success', summary: 'Success', detail: 'You data is updated', life: 3000 });
        }
        setLoading(false);
    }

    /** Loading Initialize Data */
    const initLoading = useCallback(async () => {
        setLoading(true);
        const result = await gojoyService.show(id.current);

        if (result.status === 200 || result.status === 201) {
            setPayload(result.data);
            setSelectedStatus({
                name: result.data.status,
                code: result.data.status
            })
        }
        setLoading(false);
    }, []);

    useEffect(() => {
        initLoading();
    }, [initLoading]);

    return (
        <div className="row mt-3 mb-3">
            <div className='col-12 col-md-3 col-lg-3 mt-3'>
                <div className="d-flex flex-column">
                    <label className="label-text"> Full Name </label>
                    <InputText
                        placeholder="Enter Fullname"
                        value={payload.full_name ?? ""}
                        disabled={loading}
                        onChange={(e) => payloadHandler(payload, e.target.value, "full_name", (updatePayload) => {
                            setPayload(updatePayload);
                        })}
                    />
                </div>
            </div>

            <div className='col-12 col-md-3 col-lg-3 mt-3'>
                <div className="d-flex flex-column">
                    <label className="label-text"> NRC </label>
                    <InputText
                        placeholder="Enter NRC Number"
                        value={payload.nrc ?? ""}
                        disabled={loading}
                        onChange={(e) => payloadHandler(payload, e.target.value, "nrc", (updatePayload) => {
                            setPayload(updatePayload);
                        })}
                    />
                </div>
            </div>

            <div className='col-12 col-md-3 col-lg-3 mt-3'>
                <div className="d-flex flex-column">
                    <label className="label-text"> Date of Birthday </label>
                    <Calendar
                        placeholder="Enter Date of Birthday"
                        value={moment(payload.dob).toDate() ?? ""}
                        disabled={loading}
                        dateFormat="mm/dd/yy"
                        onChange={(e) => payloadHandler(payload, e.value, "dob", (updatePayload) => {
                            setPayload(updatePayload);
                        })}
                    />
                </div>
            </div>

            <div className='col-12 col-md-3 col-lg-3 mt-3'>
                <div className="d-flex flex-column">
                    <label className="label-text"> Mobile Number </label>
                    <InputText
                        placeholder="Enter Mobile Number"
                        value={payload.mobile_number ?? ""}
                        disabled={loading}
                        onChange={(e) => payloadHandler(payload, e.target.value, "mobile_number", (updatePayload) => {
                            setPayload(updatePayload);
                        })}
                    />
                </div>
            </div>

            <div className='col-12 col-md-3 col-lg-3 mt-3'>
                <div className="d-flex flex-column">
                    <label className="label-text"> Email </label>
                    <InputText
                        placeholder="Enter Email Address"
                        value={payload.email ?? ""}
                        disabled={loading}
                        onChange={(e) => payloadHandler(payload, e.target.value, "email", (updatePayload) => {
                            setPayload(updatePayload);
                        })}
                    />
                </div>
            </div>

            <div className='col-12 col-md-3 col-lg-3 mt-3'>
                <div className="d-flex flex-column">
                    <label className="label-text"> Beneficiary Name </label>
                    <InputText
                        placeholder="Enter Beneficiary Name"
                        value={payload.beneficiary_name ?? ""}
                        disabled={loading}
                        onChange={(e) => payloadHandler(payload, e.target.value, "beneficiary_name", (updatePayload) => {
                            setPayload(updatePayload);
                        })}
                    />
                </div>
            </div>

            <div className='col-12 col-md-3 col-lg-3 mt-3'>
                <div className="d-flex flex-column">
                    <label className="label-text"> Beneficiary Contact </label>
                    <InputText
                        placeholder="Enter Beneficiary Contact"
                        value={payload.beneficiary_contact ?? ""}
                        disabled={loading}
                        onChange={(e) => payloadHandler(payload, e.target.value, "beneficiary_contact", (updatePayload) => {
                            setPayload(updatePayload);
                        })}
                    />
                </div>
            </div>

            <div className='col-12 col-md-3 col-lg-3 mt-3'>
                <div className="d-flex flex-column">
                    <label className="label-text"> Status </label>
                    <Dropdown
                        className="w-full"
                        value={selectedStatus}
                        options={generalStatus.current}
                        onChange={(e) => onStatusChangeHandler(e.value)}
                        optionLabel="name"
                        placeholder="Select Gojoy Status"
                        disabled={loading}
                    />
                </div>
            </div>

            <div className='col-12 col-md-12 col-lg-12 mt-3'>
                <div className="d-flex flex-column">
                    <label className="label-text"> Tag Name </label>
                    <InputText
                        placeholder="Enter Tag Name"
                        value={payload.tag_name ?? ""}
                        disabled={loading}
                        onChange={(e) => payloadHandler(payload, e.target.value, "tag_name", (updatePayload) => {
                            setPayload(updatePayload);
                        })}
                    />
                </div>
            </div>

            <div className="col-12 mt-3 mb-3">
                <div className='w-full d-flex flex-row justify-content-end'>
                    <Button
                        style={{ borderRadius: '5px' }}
                        className="p-button-danger"
                        size="small"
                        label='Update'
                        loading={loading}
                        disabled={loading}
                        onClick={() => updateGojoy()}
                    />
                </div>
            </div>

            <Toast ref={toast} />
            <ConfirmDialog />
        </div>

    );
}

if (document.getElementById('gojoy-detail')) {
    const root = ReactDOM.createRoot(document.getElementById('gojoy-detail'));
    root.render(<GojoyDetail />);
}