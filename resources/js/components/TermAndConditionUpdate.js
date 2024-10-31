import ReactDOM from 'react-dom/client';
import React, { useRef, useState } from 'react';
import { InputText } from 'primereact/inputtext';
import { ConfirmDialog } from 'primereact/confirmdialog';
import { Toast } from 'primereact/toast';
import { payloadHandler } from '../helpers/utilities';
import { Button } from 'primereact/button';
import { termAndConditionServices } from '../services/termAndConditionServices';
import ReactEditor from "react-text-editor-kit";
import { baseURL, endpoints } from '../constants';
import { useCallback } from 'react';
import { useEffect } from 'react';

export default function TermAndConditionUpdate() {

    const [loading, setLoading] = useState(false);
    const [payload, setPayload] = useState({
        title: "",
        content: '',
    }); 

    const toast = useRef(null);

    const id = useRef(window.location.pathname.split("/")[3]);

    /** Update Term And Condation */
    const updateTermAndCondition = async () => {
        setLoading(true);
        const result = await termAndConditionServices.update(payload, id.current);

        if(result.status === 200 || result.status === 201) {
            toast.current.show({ severity: 'success', summary: 'Success', detail: 'You data is updated', life: 3000 });
            window.location.replace(`${baseURL}/admin/${endpoints.termAndCondition}`);
        }
        setLoading(false);
    }

    const initLoading = useCallback(async () => {
        setLoading(true);
        const result = await termAndConditionServices.show(id.current);

        if(result.status == 201 || result.status === 200) {
            setPayload(result.data);
        }
        setLoading(false);
    },[id]);

    useEffect(() => {
        initLoading();
    },[initLoading]);

    return (
        <div className="row mt-3 mb-3">
            <div className='col-12 col-md-12 col-lg-12 mt-3'>
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

            <div className='col-12 col-md-12 col-lg-12 mt-3'>
                <div className="d-flex flex-column">
                    <label className="label-text"> Content </label>
                    <ReactEditor 
                        onChange={(e) => payloadHandler(payload, e, 'content', (updatePayload) => {
                            setPayload(updatePayload);
                        })}
                        value={payload.content}
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
                        onClick={() => updateTermAndCondition()}
                    />
                </div>  
            </div>

            <Toast ref={toast} />
            <ConfirmDialog />
        </div>

    );
}

if (document.getElementById('term-and-condition-update')) {
    const root = ReactDOM.createRoot(document.getElementById('term-and-condition-update'));
    root.render(<TermAndConditionUpdate />);
}