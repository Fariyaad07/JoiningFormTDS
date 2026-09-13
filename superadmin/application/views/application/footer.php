<!-- Footer Section -->
<footer class="application-footer">
    <div class="footer-container">
        <!--<h3>Important Instructions</h3>

        <ul class="footer-points">
            <li>Please make sure that applicant fills all information and uploads all required documents before final submission of the application.</li>

            <li>Please enter all relevant details carefully.</li>

            <li>Please fill your complete address along with Pin Code.</li>

            <li>After final submission, you will not be allowed to edit any details.</li>

            <li>Applicant must upload self-attested scanned documents and a recent passport size photograph.</li>

            <li><strong>Minimum age limit: 18 years.</strong></li>
        </ul>-->

        <div class="footer-note">
            © <?= date('Y'); ?> TDS Group. All Rights Reserved.
        </div>
    </div>
</footer>

<style>
.application-footer {
    background: linear-gradient(180deg,#6c757d,#495057);
    color: #ffffff;
    padding: 35px 20px;
    margin-top: 40px;
    border-top: 4px solid #38bdf8;
    font-family: Arial, sans-serif;
}

.footer-container {
    max-width: 1100px;
    margin: auto;
}

.application-footer h3 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #38bdf8;
    text-align: center;
    font-weight: 700;
}

.footer-points {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-points li {
    position: relative;
    padding-left: 35px;
    margin-bottom: 15px;
    line-height: 1.7;
    font-size: 15px;
    color: #f1f5f9;
}

.footer-points li::before {
    content: "\279C";
    position: absolute;
    left: 0;
    top: 0;
    color: #22c55e;
    font-size: 18px;
    font-weight: bold;
}

.footer-note {
    margin-top: 25px;
    text-align: center;
    font-size: 14px;
    color: #cbd5e1;
    border-top: 1px solid rgba(255,255,255,0.2);
    padding-top: 15px;
}

@media (max-width: 768px) {
    .application-footer {
        padding: 25px 15px;
    }

    .application-footer h3 {
        font-size: 20px;
    }

    .footer-points li {
        font-size: 14px;
    }
}
</style>